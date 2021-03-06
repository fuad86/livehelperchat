<?php

$positionArgument = array (
		'bottom_left' => array (
				'radius' => 'right',
				'position' => 'bottom:0;left:0;',
				'position_body' => 'bottom:0;left:0;',
				'shadow' => '2px -2px 5px',
				'moz_radius' => 'topright',
				'widget_hover' => '',
				'padding_text' => '9px 10px 9px 35px',
				'chrome_radius' => 'top-right',
				'background_position' => '0',
				'widget_radius' => '-webkit-border-top-right-radius: 20px;-moz-border-radius-topright: 20px;border-top-right-radius: 20px;'
		),
		'bottom_right' => array (
				'radius' => 'left',
				'position' => 'bottom:0;right:0;',
				'position_body' => 'bottom:0;right:0;',
				'shadow' => '-2px -2px 5px',
				'moz_radius' => 'topleft',
				'widget_hover' => '',
				'padding_text' => '9px 10px 9px 35px',
				'background_position' => 'left',
				'chrome_radius' => 'top-left',
				'widget_radius' => '-webkit-border-top-left-radius: 20px;-moz-border-radius-topleft: 20px;border-top-left-radius: 20px;'
		),
		'middle_right' => array (
				'radius' => 'left',
				'position' => 'top:400px;right:-155px;',
				'position_body' => 'top:400px;right:0px;',
				'shadow' => '0px 0px 10px',
				'widget_hover' => 'right:0;transition: 1s;',
				'moz_radius' => 'topleft',
				'padding_text' => '9px 10px 9px 35px',
				'background_position' => '0',
				'chrome_radius' => 'top-left',
				'widget_radius' => '-webkit-border-top-left-radius: 20px;-moz-border-radius-topleft: 20px;border-top-left-radius: 20px;      -webkit-border-bottom-left-radius: 20px;-moz-border-radius-bottomleft: 20px;border-bottom-left-radius: 20px;'
		),
		'middle_left' => array (
				'radius' => 'left',
				'position' => 'top:400px;left:-155px;',
				'position_body' => 'top:400px;left:0px;',
				'shadow' => '0px 0px 10px',
				'padding_text' => '9px 35px 9px 9px',
				'widget_hover' => 'left:0;transition: 1s;',
				'moz_radius' => 'topright',
				'background_position' => '95%',
				'chrome_radius' => 'top-right',
				'widget_radius' => '-webkit-border-top-right-radius: 20px;-moz-border-radius-topright: 20px;border-top-right-radius: 20px;      -webkit-border-bottom-right-radius: 20px;-moz-border-radius-bottomright: 20px;border-bottom-right-radius: 20px;'
		)
);

if (key_exists($position, $positionArgument)){
	$currentPosition = $positionArgument[$position];
} else {
	$currentPosition = $positionArgument['bottom_left'];
}

?>

var lhc_Questionary = function() {
	var self = this;

	function addCss(css_content) {
        var head = document.getElementsByTagName('head')[0];
        var style = document.createElement('style');
        style.type = 'text/css';

        if(style.styleSheet) {
          style.styleSheet.cssText = css_content;
        } else {
          rules = document.createTextNode(css_content);
          style.appendChild(rules);
        };

        head.appendChild(style);
   };

   function appendHTML(htmlStr) {
        var frag = document.createDocumentFragment(),
            temp = document.createElement('div');
        temp.innerHTML = htmlStr;
        while (temp.firstChild) {
            frag.appendChild(temp.firstChild);
        };
        return frag;
    };

	this.removeById = function(EId)
    {
        return(EObj=document.getElementById(EId))?EObj.parentNode.removeChild(EObj):false;
    };

    this.hide = function() {
        var th = document.getElementsByTagName('head')[0];
        var s = document.createElement('script');
        s.setAttribute('type','text/javascript');
        s.setAttribute('src','<?php echo erLhcoreClassSystem::instance()->baseHTTP?><?php echo $_SERVER['HTTP_HOST']?><?php echo erLhcoreClassDesign::baseurl('questionary/votingwidgetclosed')?>');
        th.appendChild(s);
        self.removeById('lhc_container_questionary');
    };

	this.showVotingForm = function() {

   		  self.removeById('lhc_container_questionary');

   		  this.initial_iframe_url = "<?php echo erLhcoreClassSystem::instance()->baseHTTP?><?php echo $_SERVER['HTTP_HOST']?><?php echo erLhcoreClassDesign::baseurl('questionary/votingwidget')?>"+'?URLReferer='+escape(document.location);

   		  this.iframe_html = '<iframe id="fdbk_iframe" allowTransparency="true" scrolling="no" class="loading" frameborder="0" ' +
                       ( this.initial_iframe_url != '' ? ' src="'    + this.initial_iframe_url + '"' : '' ) +
                       ' width="300"' +
                       ' height="200"' +
                       ' style="width: 250px; height: 220px;"></iframe>';

          this.iframe_html = '<div id="lhc_container_questionary">' +
                              '<div id="lhc_questionary_header"><span id="lhc_questionary_title"><a title="Powered by Live Helper Chat" href="http://livehelperchat.com" target="_blank"><img src="<?php echo erLhcoreClassSystem::instance()->baseHTTP?><?php echo $_SERVER['HTTP_HOST']?><?php echo erLhcoreClassDesign::design('images/icons/lhc.png');?>" alt="Live Helper Chat" /></a></span><a href="#" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/getstatus',"Close")?>" id="lhc_questionary_close"><img src="<?php echo erLhcoreClassSystem::instance()->baseHTTP?><?php echo $_SERVER['HTTP_HOST']?><?php echo erLhcoreClassDesign::design('images/icons/cancel.png');?>" title="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/getstatus',"Close")?>" alt="<?php echo erTranslationClassLhTranslation::getInstance()->getTranslation('chat/getstatus',"Close")?>" /></a></div>' +
                              this.iframe_html + '</div>';

          raw_css = "#lhc_container_questionary * {font-family:arial\;font-size:12px\;box-sizing: content-box\;-moz-box-sizing:content-box;}\#lhc_voting_content{padding:5px;}\n#lhc_container_questionary img {border:0;}\n#lhc_questionary_title{float:left;}\n#lhc_questionary_header{position:relative;z-index:9999;height:15px;overflow:hidden;-webkit-border-<?php echo $currentPosition['chrome_radius']?>-radius: 10px;-moz-border-radius-<?php echo $currentPosition['moz_radius']?>: 10px;border-<?php echo $currentPosition['chrome_radius']?>-radius: 10px;background-color:#FFF;text-align:right;clear:both;border-bottom:1px solid #CCC;padding:5px;}\n#lhc_questionary_close{padding:2px;float:right;}\n#lhc_questionary_close:hover{background:#e5e5e5;}\n#lhc_container_questionary {background-color:#FFF\;width:250px;\nz-index:9999;\n position: fixed;<?php echo $currentPosition['position_body']?>;-webkit-box-shadow: <?php echo $currentPosition['shadow']?> rgba(50, 50, 50, 0.17);-moz-box-shadow: <?php echo $currentPosition['shadow']?> rgba(50, 50, 50, 0.17);box-shadow: <?php echo $currentPosition['shadow']?> rgba(50, 50, 50, 0.17);border:1px solid #CCC;-webkit-border-<?php echo $currentPosition['chrome_radius']?>-radius: 10px;-moz-border-radius-<?php echo $currentPosition['moz_radius']?>: 10px;border-<?php echo $currentPosition['chrome_radius']?>-radius: 10px; }\n#lhc_container_questionary iframe.loading{\nbackground: #FFF url(<?php echo erLhcoreClassSystem::instance()->baseHTTP?><?php echo $_SERVER['HTTP_HOST']?><?php echo erLhcoreClassDesign::design('images/general/loading.gif');?>) no-repeat center center; }";

          addCss(raw_css);

          var fragment = appendHTML(this.iframe_html);
          document.body.insertBefore(fragment, document.body.childNodes[0]);

          document.getElementById('lhc_questionary_close').onclick = function() { self.hide(); return false; };
    };

    function showStatusWidget() {
       var statusTEXT = '<a id="questionary-icon" class="status-icon" href="#" onclick="return lh_inst.lh_openchatWindow()" >'+LHCVotingOptions.status_text+'</a>';
       var raw_css = "#lhc_questionary_container * {font-family:arial;font-size:12px;box-sizing: content-box;zoom:1;}\n#lhc_questionary_container .status-icon{text-decoration:none;font-size:12px;font-weight:bold;color:#000;display:block;padding:<?php echo $currentPosition['padding_text']?>;background:url('<?php echo erLhcoreClassSystem::instance()->baseHTTP?><?php echo $_SERVER['HTTP_HOST']?><?php echo erLhcoreClassDesign::design('images/icons/plant.png');?>') no-repeat <?php echo $currentPosition['background_position']?> center}\n#lhc_questionary_container:hover{<?php echo $currentPosition['widget_hover']?>}\n#lhc_questionary_container{<?php echo $currentPosition['widget_radius']?>-webkit-box-shadow: <?php echo $currentPosition['shadow']?> rgba(50, 50, 50, 0.17);-moz-box-shadow: <?php echo $currentPosition['shadow']?> rgba(50, 50, 50, 0.17);box-shadow: <?php echo $currentPosition['shadow']?> rgba(50, 50, 50, 0.17);border-top:1px solid #e3e3e3;border-left:1px solid #e3e3e3;padding:5px 0px 0px 5px;width:190px;font-family:arial;font-size:12px;transition: 1s;position:fixed;<?php echo $currentPosition['position']?>;background-color:#f6f6f6;z-index:9998;}\n";
       addCss(raw_css);
       var htmlStatus = '<div id="lhc_questionary_container">'+statusTEXT+'</div>';
       var fragment = appendHTML(htmlStatus);
       document.body.insertBefore(fragment, document.body.childNodes[0]);
       document.getElementById('questionary-icon').onclick = function() { self.showVotingForm(); return false; };
   };
   showStatusWidget();
};

var lhcQuestionary = new lhc_Questionary();
<?php if ($expand == 'true' && !isset($_COOKIE['lhc_vws'])) : ?>
lhcQuestionary.showVotingForm();
<?php endif;?>
