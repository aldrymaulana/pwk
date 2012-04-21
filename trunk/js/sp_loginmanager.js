/**
 * @fileOverivew JavaScript Classs for SuperPass login manager
 * @requre jquery.js (>= ver 1.4.2), rnprototype.js, sp_base.js
 *
 */
SuperPass.LoginManager = Class.create(SuperPass.Base,
{
    /**
     * Cookie Expire date
     */
    _cookieExpiresDate: 14,
    /**
     * Cookie name for SuperPass
     */
    _cookieNameSuperpass: 'spdarf',
    /**
     * Cookie name for SuperPass entitlement
     */
    _cookieNameEntitlement: 'spdarfen',
    /**
     * Cookie name for SuperPass account
     */
    _cookieNameAccount: 'spdarfem',
    /**
     * Cookie real name for SuperPass account
     */
    _cookieNameRealName: 'spdarfrn',
    /**
     * Cookie name for redirect url after login
     */
    _cookieNameDone: 'done',
    /**
     * Cookie domain for SuperPass
     */
    _cookieDomain: '.real.com',
    /**
     * Cookie path for SuperPass
     */
    _cookiePath: '/',
    /**
     * Entitlement list of SuperPass user
     */
    _userEntitlements: null,
    /**
     * constructor
     */
    initialize: function() {
    },
    /**
     * Get cookie name of SuperPass
     * @return {String} cookie name of SuperPass
     */
    getCookieNameSuperpass : function() {
        return this._cookieNameSuperpass;
    },
    /**
     * Get user entitlement list
     * @param {String} content (Optional) Cookie content of SuperPass (ex 8E32D833E0E032E@S1480:S448:S487/1289528398_20101112111958|ce3288b19b348deed8d|)
     * @return {Array} user entitlement list (skus array)
     */
    getUserEntitlements : function(content) {
        if (this._userEntitlements) {
            return this._userEntitlements;
        }
        if (!content) {
            content = $.cookie(this._cookieNameSuperpass);
        }
        if (content) {
            var splitedContentByAt = content.split('@');
            if (splitedContentByAt[1]) {
               var splitedContentByPipe = splitedContentByAt[1].split('|');
                if (splitedContentByPipe[0]) {
                   var splitedContentBySlash = splitedContentByPipe[0].split('/');
                    if (splitedContentBySlash[0]) {
                       this._userEntitlements = splitedContentBySlash[0].split(':');
                       return this._userEntitlements;
                   }
                }
            }
        }
    },
    /**
     * Get cookie content of SuperPass
     * @return {String} cookie content of SuperPass
     */
    getLoginCookieContent : function() {
        return $.cookie(this._cookieNameSuperpass);
    },
    /**
     * Get account from cookie
     * @return {String} account
     */
    getUserAccount : function() {
        return $.cookie(this._cookieNameAccount);
    },
    /**
     * Get account from cookie
     * @return {String} account
     */
    getUserName : function() {
        return $.cookie(this._cookieNameRealName);
    },
    /**
     * Get entitlement name (actual name)
     * @param {String} (Optional) Cookie content of SuperPass (ex 8E32D833E0E032E@S1480:S448:S487/1289528398_20101112111958|ce3288b19b348deed8d|)
     * @return {Array} actual entitlement name
     */
    getUserSpEntitlementName : function(spcookieContent) {
        var spsku = null;
        var entitlements = this.getUserEntitlements(spcookieContent);
        if (entitlements) {
            var spEntitlements = this.getSpEntitlements();
            for (var i = 0; i < entitlements.length; i++) {
                var sku = entitlements[i];
                if (spEntitlements[sku]) {
                    if (!spsku || (spsku && spsku.priority < spEntitlements[sku].priority)) {
                        spsku = spEntitlements[sku];
                    }
                }
            }
        }
        if (spsku && spsku.name) {
            return spsku.name;
        } else {
            return null;
        }
    },
    /**
     * Get user entitlement hash from each region SuperPass.Common
     * @return {Hash} user entitlement hash
     */
    getSpEntitlements : function() {
        return SuperPass.Common.spEntitlements;
    },
    /**
     * Get superpass login url (publishing-adjusted url)
     * @return {String} login url
     */
    getLoginUrl : function() {
        return SuperPass.Common.isPublish() ? '/login/' : '/webg/login?' + SuperPass.Common.getLibraryParam();
    },
    /**
     * Get redirect url after login done (publishing-adjusted url)
     * @return {String} login url
     */
    getLogoutRedirectUrl : function() {
        return SuperPass.Common.isPublish() ? '/' : '/webg/index?' + SuperPass.Common.getLibraryParam();
    },
    /**
     * Get done URL (using to redirect after logout) from cookie
     * @return {String} done URL
     */
    getDone: function() {
        return $.cookie(this._cookieNameDone);
    },
    /**
     * Set done URL (using to redirect after logout) into cookie
     */
    setDone: function() {
        var done = location.href;
        $.cookie(this._cookieNameDone, done, {expires: null, path: this._cookiePath, domain: this._cookieDomain});
    },
    /**
     * Set done URL (using to redirect after logout) into cookie
     * @param {String} spcookie Cookie content of SuperPass (ex 8E32D833E0E032E@S1480:S448:S487/1289528398_20101112111958|ce3288b19b348deed8d|)
     * @param {String} account Mailaddress (ex kasahi@jp.real.com)
     * @param {String} firstName first Name (ex Haruhiko)
     * @param {String} lastName last Name (ex Matsuda)
     * @param {Boolean} isKeepLogin Keep logging in or not (ex ture)
     */
    setCookie: function(spcookie, account, isKeepLogin, firstName, lastName) {
        if (isKeepLogin) {
            $.cookie(spcookie.name, spcookie.content, {expires: this._cookieExpiresDate, path: spcookie.path, domain: spcookie.domain});
            $.cookie(this._cookieNameAccount, account, {expires: this._cookieExpiresDate, path: spcookie.path, domain: spcookie.domain});
            if (firstName && lastName) {
                $.cookie(this._cookieNameRealName, firstName + " " + lastName, {expires: this._cookieExpiresDate, path: spcookie.path, domain: spcookie.domain});
            }
        } else {
            $.cookie(spcookie.name, spcookie.content, {expires: null, path: spcookie.path, domain: spcookie.domain});
            $.cookie(this._cookieNameAccount, account, {expires: null, path: spcookie.path, domain: spcookie.domain});
            if (firstName && lastName) {
                $.cookie(this._cookieNameRealName, firstName + " " + lastName, {expires: null, path: spcookie.path, domain: spcookie.domain});
            }
        }
    },
    /**
     * Delete cookie related SuperPass
     */
    deleteCookie : function() {
        $.cookie(this._cookieNameSuperpass, '', { expires: -1, path: this._cookiePath, domain: this._cookieDomain});
        $.cookie(this._cookieNameEntitlement, '', { expires: -1, path: this._cookiePath, domain: this._cookieDomain});
        $.cookie(this._cookieNameAccount, '', { expires: -1, path: this._cookiePath, domain: this._cookieDomain});
        $.cookie(this._cookieNameRealName, '', { expires: -1, path: this._cookiePath, domain: this._cookieDomain});
        $.cookie(this._cookieNameDone, '', { expires: -1, path: this._cookiePath, domain: this._cookieDomain});
    },
    /**
     * Check that user have SuperPass entitlement
     * @return {boolean} Having SuperPass entitlement or not
     */
    hasSpEntitlement : function() {
        var entitlementName = this.getUserSpEntitlementName();
        return (entitlementName);
    },
    /**
     * Check SuperPass user or not
     * @return {boolean} SuperPass user or not
     */
    isSuperpassUser : function() {
        var entitlementName = this.getUserSpEntitlementName();
        return (entitlementName === 'SuperPass');
    },
    /**
     * Check Unlimited user or not
     * @return {boolean} Unlimited user or not
     */
    isUnlimitedUser : function() {
        var entitlementName = this.getUserSpEntitlementName();
        return (entitlementName === 'Unlimited' || entitlementName === 'RealEntertainment');
    },
    /**
     * Check the login status
     * @return {boolean} User login now or not
     */
    isLogin : function() {
        var content         = this.getLoginCookieContent();
        var entitlementName = this.getUserSpEntitlementName();
        var account         = this.getUserAccount();
        return (content && entitlementName && account);
    }
});
