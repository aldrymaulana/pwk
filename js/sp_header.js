
/**
 * @fileOverivew JavaScript Classs for SuperPass header
 * @requre jquery.js (>= ver 1.4.2), rnprototype.js, sp_base.js
 *
 */
SuperPass.Header = Class.create(SuperPass.Base, {
    /**
     * Private object of SuperPass.LoginManager
     */
    _loginManager: null,

    /**
     * constructor
     */
    initialize: function() {
        this._loginManager = new SuperPass.LoginManager();
        this._setEventHandler();
    },

    /**
     * Set event hanlders in page Header
     * @private
     */
    _setEventHandler : function() {
        $('#loginState').click(function () {
            this._loginManager.deleteCookie();
            location.href = this._loginManager.getLogoutRedirectUrl();
        }.bind(this));
    },

    /**
     * Render html and parts in page header
     * @public
     */
    view: function() {
        if (this._loginManager.isLogin()) {
            var account = this._loginManager.getUserAccount();
            var entitlementName = this._loginManager.getUserSpEntitlementName();
            $('#account').html(account);
            $('#entitlement').html('[' + entitlementName + ']');
            $('#loginState').html(superpass.tmpl.translate({'source': 'Logout'})).attr('href', '#');
            if (SuperPass.Common.library === 'jp') {
                $('#upgrade').html('ホーム').attr('href', 'index.htm');
            } else {
                $('#upgrade').remove();
                if (entitlementName === 'Unlimited') {
                    $('#tour').remove();
                } else { // 'SuperPass'
                    if (location.pathname.indexOf('tour') !== -1) {
                        $('#tour').html(superpass.tmpl.translate({'source': 'Upgrade'}))
                                  .click(function() {
                                    recordOutboundLink(SuperPass.Common.signupUrl,
                                                       'header_OrderPath_SuperPass',
                                                       'globalstore.real.com');
                                    return false;});

                    } else {
                        $('#tour').html(superpass.tmpl.translate({'source': 'Upgrade'}))
                                  .attr('href', SuperPass.Common.getUrl('upgrade'));
                    }
                }
            }
        } else {
            var loginUrl = this._loginManager.getLoginUrl();
            $('#loginState').html(superpass.tmpl.translate({'source': 'Login'})).attr('href', loginUrl);
            if (SuperPass.Common.library === 'jp') {
                $('#upgrade').html('ホーム').attr('href', 'http://guide.jp.real.com/');
            } else {
                $('#upgrade').remove();
                if (location.pathname.indexOf('tour') !== -1
                    || location.pathname.indexOf('login') !== -1) {
                    $('#tour').html(superpass.tmpl.translate({'source': 'Sign up'}))
                              .click(function() {
                                    recordOutboundLink(SuperPass.Common.signupUrl,
                                                       'header_OrderPath_SuperPass',
                                                       'globalstore.real.com');
                                    return false;});
                } else {
                    $('#tour').html(superpass.tmpl.translate({'source': 'Sign up'}))
                              .attr('href', SuperPass.Common.getUrl('tour'));
                }
            }
            // When click login link, set done url into cookie.
            $('#loginState').click(function () {
                this._loginManager.setDone();
            }.bind(this));
        }
    }
});

$(document).ready(function() {
    var spHeader = new SuperPass.Header();
    spHeader.view();
});
