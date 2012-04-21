
$(function() {

    /*-- ロード時 --*/
	// ロード時にsynopsis.htmlの高さ調整
	adjustEmbedRightHeight();
	// フォームに<input>タグ内のtitle属性をデフォルトvalueとして出すplugin
    //$.updnWatermark.attachAll();
    
    /*-- synopsis内動画説明タブ・SNSタブ切り替え --*/
	// 情報タブ
	$("#mainTabsInfo").click(function () {
		var info = $("#mainDetailInfo");
		var sns = $("#mainDetailSns");
		var more = $("#mainDetailMoreInfo");
		if(!info.hasClass("show")){
            if ($("#mainTabsInfo").hasClass('fullInfo')) {
                
                $("#mainDetailInfo").addClass("cutDetail");

                $("#embedModule").hide();
			    $("#moreDetailText").text(superpass.tmpl.translate({'source': "More"}));
			    $("#moreDetailImg").addClass("moreDetail");
			    $("#moreDetailImg").removeClass("closeDetail");
			    info.show();
			    sns.hide();
			    info.addClass("show");
			    sns.removeClass("show");
			    $("#mainTabsInfo a").addClass("selected");
			    $("#mainTabsSns a").removeClass("selected");
			    $(".thumbnails").height("400px");
			    $(".embedRight").height("400px");

			    $("#moreDetailText").text(superpass.tmpl.translate({'source': "More"}));
			    $("#moreDetailImg").removeClass("closeDetail");
			    $("#moreDetailImg").addClass("moreDetail");
                $("#moreEmbedInfo").addClass("cutDetail");

			    adjustEmbedRightHeight();
            }
            else {
			    sns.hide();
			    info.show();
			    more.show();
			    info.addClass("show");
			    sns.removeClass("show");
			    $("#mainTabsInfo a").addClass("selected");
			    $("#mainTabsSns a").removeClass("selected");
			    $(".thumbnails").height("400px");
			    $(".embedRight").height("400px");
			    adjustEmbedRightHeight();
            }
		}
	});
    // SNSタブ
	$("#mainTabsSns").click(function () {
		var info = $("#mainDetailInfo");
		var sns = $("#mainDetailSns");
		var more = $("#mainDetailMoreInfo");
		if(!sns.hasClass("show")){
            if ($("#mainTabsSns").hasClass('fullSns')) {
                $("#embedModule").hide();
			    $("#moreDetailText").text(superpass.tmpl.translate({'source': "More"}));
			    $("#moreDetailImg").addClass("moreDetail");
			    $("#moreDetailImg").removeClass("closeDetail");
			    info.hide();
			    sns.show();
			    sns.addClass("show");
			    info.removeClass("show");
			    $("#mainTabsSns a").addClass("selected");
			    $("#mainTabsInfo a").removeClass("selected");
			    $(".thumbnails").height("400px");
			    $(".embedRight").height("400px");

			    $("#moreDetailText").text(superpass.tmpl.translate({'source': "More"}));
			    $("#moreDetailImg").removeClass("closeDetail");
			    $("#moreDetailImg").addClass("moreDetail");
                $("#moreEmbedInfo").addClass("cutDetail");

			    adjustEmbedRightHeight();
            }
            else {
			    info.hide();
			    more.hide();
			    sns.show();
			    sns.addClass("show");
			    info.removeClass("show");
			    $("#mainTabsSns a").addClass("selected");
			    $("#mainTabsInfo a").removeClass("selected");
			    $(".thumbnails").height("400px");
			    $(".embedRight").height("400px");
			    adjustEmbedRightHeight();
            }
		}
	});
	// もっと見るリンクを押したとき
	$("a.moreDetailTrailer").click(function (e) {
		var info = $("#mainDetailInfo");
		if(info.hasClass("cutDetail")){
			info.removeClass("cutDetail");
			$("#moreDetailText").text(superpass.tmpl.translate({'source': "Close"}));
			$("#moreDetailImg").removeClass("moreDetail");
			$("#moreDetailImg").addClass("closeDetail");
		}else{
			info.addClass("cutDetail");
			$(".thumbnails").height("400px");
			$("#moreDetailText").text(superpass.tmpl.translate({'source': "More"}));
			$("#moreDetailImg").addClass("moreDetail");
			$("#moreDetailImg").removeClass("closeDetail");
		}
		adjustEmbedRightHeight();
	});

    /*-- 新着コンテンツとランキングの切り替え --*/
	// latest
	$("#leftModule02ContentsBtn").click(function () {
		var p = $("#leftModule02Popular");
		var c = $("#leftModule02Contents");
		var pb = $("#leftModule02PopularBtn a");
		var cb = $("#leftModule02ContentsBtn a");
		p.hide();
		c.show();
		pb.removeClass("selected");
		cb.addClass("selected");
	});
    // ranking
	$("#leftModule02PopularBtn").click(function () {
		var p = $("#leftModule02Popular");
		var c = $("#leftModule02Contents");
		var pb = $("#leftModule02PopularBtn a");
		var cb = $("#leftModule02ContentsBtn a");
		c.hide();
		p.show();
		cb.removeClass("selected");
		pb.addClass("selected");
	});
      
	//date
	$("#leftModuleDateBtn").click(function () {
		var d1 = $("#leftModuleDate1");
		var d = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg) });
		var a = $("ul").filter(function() { return this.id.match(/leftModuleAlphabet\d/mg) });
		var f = $("ul").filter(function() { return this.id.match(/leftModuleFree\d/mg) });
		var db = $("#leftModuleDateBtn a");
		var ab = $("#leftModuleAlphabetBtn a");
		var fb = $("#leftModuleFreeBtn a");
		var dp = $("#datePager");
		var ap = $("#alphabetPager");
		var fp = $("#freePager");
		dp.show();
		ap.hide();
		fp.hide();
		d.hide();
		a.hide();
		f.hide();
 		d1.show();
		db.addClass("selected");
		ab.removeClass("selected");
		fb.removeClass("selected");

        var remove_pagers = $("a").filter(function() { return this.id.match(/datePage\d/mg); });
        remove_pagers.removeClass("selected");
        var add_pager = $("#datePage1");
        add_pager.addClass("selected");
        var hide_date_lists = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg); });
        hide_date_lists.hide();
        var hide_alphabet_lists = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg); });
        hide_alphabet_lists.hide();
        var hide_free_lists = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg); });
        hide_free_lists.hide();
        var show_list = $("#leftModuleDate1");
        show_list.show();
	});
    // alphabet
	$("#leftModuleAlphabetBtn").click(function () {
		var d = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg) });
		var a = $("ul").filter(function() { return this.id.match(/leftModuleAlphabet\d/mg) });
		var f = $("ul").filter(function() { return this.id.match(/leftModuleFree\d/mg) });
		var a1 = $("#leftModuleAlphabet1");
		var db = $("#leftModuleDateBtn a");
		var ab = $("#leftModuleAlphabetBtn a");
		var fb = $("#leftModuleFreeBtn a");
		var dp = $("#datePager");
		var ap = $("#alphabetPager");
		var fp = $("#freePager");
		dp.hide();
		ap.show();
		fp.hide();
 		d.hide();
		a.hide();
		f.hide();
		a1.show();
		db.removeClass("selected");
		ab.addClass("selected");
		fb.removeClass("selected");

        var remove_pagers = $("a").filter(function() { return this.id.match(/alphabetPage\d/mg); });
        remove_pagers.removeClass("selected");
        var add_pager = $("#alphabetPage1");
        add_pager.addClass("selected");
        var hide_date_lists = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg); });
        hide_date_lists.hide();
        var hide_alphabet_lists = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg); });
        hide_alphabet_lists.hide();
        var hide_free_lists = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg); });
        hide_free_lists.hide();
        var show_list = $("#leftModuleAlphabet1");
        show_list.show();
	});
    // free
	$("#leftModuleFreeBtn").click(function () {
		var d = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg) });
		var a = $("ul").filter(function() { return this.id.match(/leftModuleAlphabet\d/mg) });
		var f = $("ul").filter(function() { return this.id.match(/leftModuleFree\d/mg) });
		var f1 = $("#leftModuleFree1");
		var db = $("#leftModuleDateBtn a");
		var ab = $("#leftModuleAlphabetBtn a");
		var fb = $("#leftModuleFreeBtn a");
		var dp = $("#datePager");
		var ap = $("#alphabetPager");
		var fp = $("#freePager");
		dp.hide();
		ap.hide();
		fp.show();
 		d.hide();
		a.hide();
		f.hide();
		f1.show();
		db.removeClass("selected");
		ab.removeClass("selected");
		fb.addClass("selected");
                                      
        var remove_pagers = $("a").filter(function() { return this.id.match(/freePage\d/mg); });
        remove_pagers.removeClass("selected");
        var add_pager = $("#freePage1");
        add_pager.addClass("selected");
        var hide_date_lists = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg); });
        hide_date_lists.hide();
        var hide_alphabet_lists = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg); });
        hide_alphabet_lists.hide();
        var hide_free_lists = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg); });
        hide_free_lists.hide();
        var show_list = $("#freeModuleAlphabet1");
        show_list.show();
	});

    // pagenation for date
    $("a").filter(function() { return this.id.match(/datePage(\d)/mg); }).click(function () {
        $(this).attr("id").match(/.+(\d)/);
        var selectedIdx = RegExp.$1;
        var remove_pagers = $("a").filter(function() { return this.id.match(/datePage\d/mg); });
        remove_pagers.removeClass("selected");
        var add_pager = $("#datePage" + selectedIdx);
        add_pager.addClass("selected");
        var hide_lists = $("ul").filter(function() { return this.id.match(/leftModuleDate\d/mg); });
        hide_lists.hide();
        var show_list = $("#leftModuleDate" + selectedIdx);
        show_list.show();
	});

    // pagenation for alphabet
    $("a").filter(function() { return this.id.match(/alphabetPage(\d)/mg); }).click(function () {
        $(this).attr("id").match(/.+(\d)/);
        var selectedIdx = RegExp.$1;
        var remove_pagers = $("a").filter(function() { return this.id.match(/alphabetPage\d/mg); });
        remove_pagers.removeClass("selected");
        var add_pager = $("#alphabetPage" + selectedIdx);
        add_pager.addClass("selected");
        var hide_lists = $("ul").filter(function() { return this.id.match(/leftModuleAlphabet\d/mg); });
        hide_lists.hide();
        var show_list = $("#leftModuleAlphabet" + selectedIdx);
        show_list.show();
	});

    // pagenation for date
    $("a").filter(function() { return this.id.match(/freePage(\d)/mg); }).click(function () {
        $(this).attr("id").match(/.+(\d)/);
        var selectedIdx = RegExp.$1;
        var remove_pagers = $("a").filter(function() { return this.id.match(/freePage\d/mg); });
        remove_pagers.removeClass("selected");
        var add_pager = $("#freePage" + selectedIdx);
        add_pager.addClass("selected");
        var hide_lists = $("ul").filter(function() { return this.id.match(/leftModuleFree\d/mg); });
        hide_lists.hide();
        var show_list = $("#leftModuleFree" + selectedIdx);
        show_list.show();
	});

});

/*-- embedモジュールの高さ調整function --*/
function adjustEmbedRightHeight(){
	$(".embedRight").height($("#embedLeft").height());
	$(".thumbnails").height($("#embedLeft").height()-15);

}
