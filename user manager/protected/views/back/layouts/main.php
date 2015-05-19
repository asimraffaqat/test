<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<!--link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" / -->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<!--link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php //echo Yii::app()->request->baseUrl; ?>/css/form.css" / -->
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/jquery.cluetip.css'); ?>
    
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.hoverIntent.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery.cluetip.js'); ?>
    <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/blockui.js'); ?>
    <?php 
        Yii::app()->bootstrap->register(); 
        Yii::app()->clientScript->registerCoreScript('jquery');
    ?>
    <?php Yii::app()->clientScript->registerCssFile(Yii::app()->baseUrl.'/css/cosmo.css'); ?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    <style type="text/css">
        .container, .navbar-fixed-top .container, .navbar-fixed-bottom .container {
            width: 90%;
        }
        .grid-view{
            overflow-x: auto;
            margin-top:5px;
        }
        .grid-view .summary {
            margin-bottom: 5px;
            text-align: right;
        }
        .well-main {
            background-color: #FFFFFF;
            border: 1px solid #E3E3E3;
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05) inset;
            margin-bottom: 20px;
            min-height: 20px;
            padding: 19px;
        }
        .errorMessage
        {
             background-color: #FF0039;
            border-color: rgba(0, 0, 0, 0);
            color: #FFFFFF;
            padding-bottom: 5px;
            padding-top: 5px;
            padding-left: 2px;
            width:95%;
        }
        #LoginForm_rememberMe
        {
            margin-top: 0px;
        }
    </style>
</head>

<body style="background-image: url(<?php echo Yii::app()->request->baseUrl; ?>/images/light_wool.png);background-repeat: repeat;">
    <div>
        <?php
            $this->widget('bootstrap.widgets.TbNavbar', array(
            //'fixed'=>false,
            'color' => TbHtml::NAVBAR_COLOR_INVERSE,
            'brandLabel'=>Yii::app()->name,
            'brandUrl'=>Yii::app()->request->baseUrl."/back",
            'collapse'=>true, // requires bootstrap-responsive.css
            'items'=>array(
                array(
                    'class'=>'bootstrap.widgets.TbNav',
                    'items'=>array(
                        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Dashboard', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
                    array('label'=>'User Manager', 'url'=>array('/user/admin'), 'visible'=>!Yii::app()->user->isGuest),
                    ),
                ),
                array(
                    'class'=>'bootstrap.widgets.TbNav',
                    'htmlOptions'=>array('class'=>'pull-right'),
                    'items'=>array(
                        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                        ),

                       ),
                ),
            ));
        ?>
    </div>
    <?php
        if(isset(Yii::app()->session['notify']) && strlen(Yii::app()->session['notify'])> 1)
        {
            $this->widget('application.extensions.PNotify.PNotify',array(
                'options'=>array(
                    'title'=>Yii::app()->session['notify'],
                    'text'=>Yii::app()->session['notify_text'],
                    'type'=>'info',
                    'closer'=>true,
                    'hide'=>true))
            );
        }
        Yii::app()->session['notify']="";
        Yii::app()->session['notify_text']="";

    ?>
    <div class="container well-main" id="page">
	    <div id="header">
		    <div id="logo">
                <?php echo CHtml::encode(Yii::app()->name); ?>
            </div>
	    </div><!-- header -->    
	    <div style="margin-top:35px;">
            <?php if(isset($this->breadcrumbs)):?>
                <?php $this->widget('bootstrap.widgets.TbBreadcrumb', array(
                        'links'=>$this->breadcrumbs,
                        )); 
                ?><!-- breadcrumbs -->
            <?php endif?>
        </div>
        <div style="min-height:550px;">
	        <?php echo $content; ?>
        </div>
	    <div class="clear"></div>
	    <div class="well" style="text-align:center;margin-bottom:10px;">
		    Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		    All Rights Reserved.<br/>
		    <?php echo Yii::powered(); ?>
	    </div><!-- footer -->
</div><!-- page -->

</body>
</html>
