/**
 * @fileOverivew Javscript base library for SuperPass
 * @requre jquery.js (>= ver 1.4.2), rnprototype.js
 *
 */
if (typeof(SuperPass) == 'undefined') {
    SuperPass = {};
}

/**
 * JavaScript Class for SuperPass Common
 * @class
 */
SuperPass.Common = Class.create({
    /**
     * constructor
     */
    initialize: function() {}
});

/**
 * JavaScript Static Class of SuperPass.Common
 * @class
 */
Object.extend(SuperPass.Common, {
    /**
     * Check the publising page or not
     * @return {boolean} public page or not
     * @public
     */
    isPublish: function() {
        return (location.hostname.indexOf('preview') !== -1
               || location.hostname.indexOf('video.au.real.com') !== -1
               || location.hostname.indexOf('taiwan.real.com') !== -1
               || location.hostname.indexOf('guide.jp.real.com') !== -1
               || location.hostname.indexOf('asia.real.com') !== -1
               || location.hostname.indexOf('tw.real.com') !== -1
               || location.pathname.indexOf('pub=1') !== -1
               || location.pathname.indexOf('.htm') !== -1);
    },
    /**
     * Get 'library' parameter from url
     * @return {String} value of library
     * @public
     */
    getLibraryParam: function() {
        var libraryParam = (location.href.match(/(library=(jp|tw|apac))/));
        if (libraryParam != undefined) {
            return libraryParam[0];
        }
        else {
            return  'library=apac';
        }
    },

    checkAdult: function() {
        var cookieNameIsAdult = 'isadult';
        if ($.cookie(cookieNameIsAdult) == null) {
            location.href = SuperPass.Common.isPublish()
                ? "/notice/"
                : '/webg/notice?' + SuperPass.Common.getLibraryParam();
        }
        else {
            location.href = SuperPass.Common.isPublish()
                ? "/genre/gravure/"
                : '/webg/genre?name=gravure&' + SuperPass.Common.getLibraryParam();
        }
    },
    /**
     * set mature alert to the link of Matured content.
     * @public
     */
    setAdultNotice: function() {
        $('a').each(function(index, element) {
            var linkUrl = $(this).attr('href');
             if(linkUrl.indexOf('adult=1') !== -1) {
                $(this).click(function(e) {
                    e.preventDefault();
                    SuperPass.Common.checkAdult(linkUrl);
                });
             }
        });
    },
                  
    /**
     * Get publish/unpublish URL based on HTTP request
     * @return {String} internal URL based on publish/unpublish mode
     */
    getUrl: function(action) {
        return SuperPass.Common.isPublish()
                    ? '/' + action + '/'
                    : '/webg/' + action + '?' + SuperPass.Common.getLibraryParam();
    },
    /**
     * Check installed flash player in browser or not
     * @return {String} value of library
     * @public
     */
    isInstalledFlashPlayer: function() {
        var flashplayer_ver = 0;
        if(navigator.plugins && navigator.mimeTypes['application/x-shockwave-flash']){
            // except IE browser
            var plugin = navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin;
            if (plugin) {
                // Installed Flash Player
                flashplayer_ver = parseInt(plugin.description.match(/\d+\.\d+/));
            }
        } else{
            // IE browser or have not install FlashPlayer
            try{
                var flashOCX = new ActiveXObject("ShockwaveFlash.ShockwaveFlash").GetVariable("$version").match(/([0-9]+)/);
                if (flashOCX) {
                    // Installed Flash Player
                    flashplayer_ver = parseInt(flashOCX[0]);
                }
            } catch(e) {}
        }
        if (flashplayer_ver <= 6) {
            flashplayer_ver = 0;
        }
        return (flashplayer_ver !== 0);
    },

    /**
     * write Footer Ad tags published by quickflix or google, and check country code from request IP address
     * @return {String} tag of ad code
     * @public
     */
    writeFooterAdByCountry: function(callbackJson) {
        if (callbackJson.response.errorcode) {
            // jsonp response error
        } else {
            var countryCode = callbackJson.response.countryCode;
            switch (countryCode) {
            case 'ID':
                document.write('<script language=JavaScript src="http://a.admaxserver.com/servlet/ajrotator/440602/0/vj?z=admaxasia2&dim=280673&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=e87c74e0-fa2c-4de4-8918-49749fe43b79"><\/script><noscript><a href="http://a.admaxserver.com/servlet/ajrotator/440602/0/cc?z=admaxasia2&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=e87c74e0-fa2c-4de4-8918-49749fe43b79"><img src="http://a.admaxserver.com/servlet/ajrotator/440602/0/vc?z=admaxasia2&dim=280673&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=e87c74e0-fa2c-4de4-8918-49749fe43b79&abr=$imginiframe" width="728" height="90" border="0"><\/a><\/noscript>');
                break;
            case 'SG':
                document.write('<script language=JavaScript src="http://a.admaxserver.com/servlet/ajrotator/440601/0/vj?z=admaxasia2&dim=280673&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=108c2ad6-4c73-49b7-a779-2fd0f0e0a209"><\/script><noscript><a href="http://a.admaxserver.com/servlet/ajrotator/440601/0/cc?z=admaxasia2&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=108c2ad6-4c73-49b7-a779-2fd0f0e0a209"><img src="http://a.admaxserver.com/servlet/ajrotator/440601/0/vc?z=admaxasia2&dim=280673&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=108c2ad6-4c73-49b7-a779-2fd0f0e0a209&abr=$imginiframe" width="728" height="90" border="0"><\/a><\/noscript>');
                break;
            case 'TH':
                document.write('<script language=JavaScript src="http://a.admaxserver.com/servlet/ajrotator/440603/0/vj?z=admaxasia2&dim=280673&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=253e7ebd-0e6f-4619-9a89-ff003a92f315"><\/script><noscript><a href="http://a.admaxserver.com/servlet/ajrotator/440603/0/cc?z=admaxasia2&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=253e7ebd-0e6f-4619-9a89-ff003a92f315"><img src="http://a.admaxserver.com/servlet/ajrotator/440603/0/vc?z=admaxasia2&dim=280673&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=253e7ebd-0e6f-4619-9a89-ff003a92f315&abr=$imginiframe" width="728" height="90" border="0"><\/a><\/noscript>');
                break;
            case 'VN':
                document.write('<script language=JavaScript src="http://a.admaxserver.com/servlet/ajrotator/440605/0/vj?z=admaxasia2&dim=280673&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=4ee29b4a-9d73-4513-853d-0bca6ec17dce"><\/script><noscript><a href="http://a.admaxserver.com/servlet/ajrotator/440605/0/cc?z=admaxasia2&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=4ee29b4a-9d73-4513-853d-0bca6ec17dce"><img src="http://a.admaxserver.com/servlet/ajrotator/440605/0/vc?z=admaxasia2&dim=280673&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=4ee29b4a-9d73-4513-853d-0bca6ec17dce&abr=$imginiframe" width="728" height="90" border="0"><\/a><\/noscript>');
                break;
            case 'MY':
                document.write('<script language=JavaScript src="http://a.admaxserver.com/servlet/ajrotator/440606/0/vj?z=admaxasia2&dim=280673&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=c81a068b-b7d2-4565-8c8a-48e1a1348dec"><\/script><noscript><a href="http://a.admaxserver.com/servlet/ajrotator/440606/0/cc?z=admaxasia2&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=c81a068b-b7d2-4565-8c8a-48e1a1348dec"><img src="http://a.admaxserver.com/servlet/ajrotator/440606/0/vc?z=admaxasia2&dim=280673&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=c81a068b-b7d2-4565-8c8a-48e1a1348dec&abr=$imginiframe" width="728" height="90" border="0"><\/a><\/noscript>');
                break;
            case 'PH':
                document.write('<script language=JavaScript src="http://a.admaxserver.com/servlet/ajrotator/440604/0/vj?z=admaxasia2&dim=280673&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=53cb6aef-5136-4493-b4a0-3bd35882d64b"><\/script><noscript><a href="http://a.admaxserver.com/servlet/ajrotator/440604/0/cc?z=admaxasia2&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=53cb6aef-5136-4493-b4a0-3bd35882d64b"><img src="http://a.admaxserver.com/servlet/ajrotator/440604/0/vc?z=admaxasia2&dim=280673&pid=6ab8f582-7f51-4712-a3bb-d371a8577cb6&asid=53cb6aef-5136-4493-b4a0-3bd35882d64b&abr=$imginiframe" width="728" height="90" border="0"><\/a><\/noscript>');
                break;
            default:
                google_ad_client = "ca-pub-9181538905516544";
                /* APAC Web SuperPass 728x90 image_111102 */
                google_ad_slot = "5798971270";
                google_ad_width = 728;
                google_ad_height = 90;
                document.write('<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"><\/script>');
                //-->
            }
        }
    },
    /**
     * write Rectangle Ad tags published by quickflix or google, and check country code from request IP address
     * @return {String} tag of ad code
     * @public
     */
    writeRectangleAdByCountry: function(callbackJson) {
        if (callbackJson.response.errorcode) {
            // jsonp response error
        } else {
            var countryCode = callbackJson.response.countryCode;

            if (countryCode == 'AU' && ($('div#hasGravure').text() != '1')) {
                
                document.write("<script type='text/javascript' src='http://partner.googleadservices.com/gampad/google_service.js'></script>");
                document.write("<script type='text/javascript'>GS_googleAddAdSenseService(\"ca-pub-7054404759274016\");GS_googleEnableAllServices();</script>");
                document.write("<script type='text/javascript'>GA_googleAddSlot(\"ca-pub-7054404759274016\", \"Real_Island\");</script>");
                document.write("<script type='text/javascript'>GA_googleFetchAds();</script><!-- Real_Island -->");
                document.write("<script type='text/javascript'>GA_googleFillSlot(\"Real_Island\");</script>");
            }
            else {
                google_ad_client = "ca-pub-9181538905516544";
                /* APAC Web Superpass 300x250_111102 */
                google_ad_slot = "5908459254";
                google_ad_width = 300;
                google_ad_height = 250;
                document.write('<script type="text/javascript" src="http://pagead2.googlesyndication.com/pagead/show_ads.js"><\/script>');
            }
        }
    },
    /**
     * open alert modal window for mature content
     * @param {String} url jump target url
     * @public
     */
    openMatureModal: function(url) {
        var lineBreak   = $('<br />');
        var alertIcon   = $('<span />').addClass('ui-icon ui-icon-alert')
                                       .css({'text-align':'center', 'margin':'0px auto'});
        var alertMsg    = $('<p />').append(superpass.tmpl.translate(
                                        {'source': 'Video content you are about to see contains sexually-oriented nudity designed to be viewed by adults and therefore may be unsuitable for children.'}))
                                    .css({'color':'black', 'margin':'3px'});
        var confirmMsg  = $('<p />').append(superpass.tmpl.translate({'source': 'Would you like to proceed?'}))
                                    .css({'color':'black'});
        var modalDialog = $('<div />')
                                      //.append(alertIcon)
                                      //.append(lineBreak)
                                      .append(alertMsg)
                                      .append(lineBreak)
                                      .append(lineBreak)
                                      .append(confirmMsg);
         modalDialog.dialog({
            title: superpass.tmpl.translate({'source': 'Notice'}),
            width:600,
            resizable: false,
            draggable: false,
            modal: true,
            buttons: [
                {text: superpass.tmpl.translate({'source': 'Yes'}),
                 click: function() {location.href = url;}},
                {text: superpass.tmpl.translate({'source': 'No'}),
                 click: function() {$(this).dialog('close');}}
            ]
        });
        $('div.ui-widget-overlay').click(function(e) {
            modalDialog.dialog('close');
        });
    },
    /**
     * set mature alert to the link of Matured content.
     * @public
     */
    setMatureAlert: function() {
        $('a').each(function(index, element) {
            var linkUrl = $(this).attr('href');
             if(linkUrl.indexOf('mature=1') !== -1) {
                $(this).click(function(e) {
                    e.preventDefault();
                    SuperPass.Common.openMatureModal(linkUrl);
                });
             }
        });
    },
    /**
     * parse HTTP get parameters
     * @public
     */
    parseHttpGetParams: function() {
        var parsed = {};
        var params = window.location.search.substring(1); // remove '?' from query string
        $.each(params.split('&'), function(idx, param) {
            var pair = param.split('=');
            if (pair.length == 2) {
                parsed[pair[0]] = pair[1];
            } else if (pair.length == 1) {
                parsed[pair] = null;
            }
        });
        return parsed;
    }
});
google.setOnLoadCallback(function() {
    SuperPass.Common.setMatureAlert();
    SuperPass.Common.setAdultNotice();
});

if (typeof(SuperPass.Module) === "undefined")
    SuperPass.Module = {}

SuperPass.Module.Flvplayer = Class.create({});
Object.extend(SuperPass.Module.Flvplayer, {
    _playerSwf: 'webg/swf/real_flvplayer.swf',
    _defaultWidth: 576,
    _defaultHeight: 324,
    _defaultParams: {quality: "high",
                     bgcolor: "#000000",
                     time: "20100729",
                     play: "false",
                     autostart: "false",
                     loop: "true",
                     devicefont: "false",
                     menu: "true",
                     allowFullScreen: "true",
                     wmode: "transparent",
                     allowScriptAccess: "sameDomain"},
    /**
     * embed flv player with swfobject
     * @param {String} element element ID of place holder for embedded player
     * @param {String} videoUrl video url
     * @param {Number} (Optional) width in px
     * @param {Number} (Optional) height in px
     * @param {Object} (Optional) params parameter object for Flash
     * @param {String} (Optional) swf video player's swf
     * @param {String} (Optional) file path (slist)
     * @param {Boolean} (Optional) secure streaming from akamai or not
     */
    embed: function(elementId, videoUrl, width, height, params, swf, slistPath, isSecureStreaming) {
        width  = (width === undefined) ? this._defaultWidth : width;
        height = (height === undefined) ? this._defaultHeight : height;
        params = (params === undefined) ? this._defaultParams : Object.extend(this._defaultParams, params);
        if (swf === undefined) {
            swf = (SuperPass.Common.isPublish()) ? '/' + this._playerSwf : '/' + this._playerSwf;
        }

        var ret = swfobject.embedSWF(swf,
                           elementId,
                           width,
                           height,
                           "9.0.0",
                           "",
                           {src: videoUrl,
                            gaIds: SuperPass.Common.defaultGAProfileIds,
                            slist: slistPath,
                            fss: isSecureStreaming, autostart: 'false', play: 'false'},
                           params
                          );
    }
});
