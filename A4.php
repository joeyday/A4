<?php
/**
 * A4: A new from scratch minimalist MediaWiki skin initially
 * created for Joey’s Papers, http://papers.jday.us
 *
 * @todo document
 * @file
 * @ingroup Skins
 */

if( !defined( 'MEDIAWIKI' ) )
	die( -1 );

/**
 * SkinTemplate class for Vector skin
 * @ingroup Skins
 */
class SkinA4 extends SkinTemplate {
   	/* Functions */
	var $skinname = 'a4', $stylename = 'a4',
		$template = 'A4Template', $useHeadElement = true;

	/**
	 * Initializes output page and sets up skin-specific parameters
	 * @param object $out Output page object to initialize
	 */
	public function initPage( OutputPage $out ) {
        parent::initPage( $out );
    }
}

class A4Template extends QuickTemplate {
	public function execute() {
		?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="<?php $this->text('charset') ?>" />
<meta name="viewport" content="width=785,minimum-scale=1.0" />
<?php $this->html('headlinks') ?>
<title><?php $this->text('pagetitle') ?></title>
<link href="http://fonts.googleapis.com/css?family=Droid+Sans+Mono" rel="stylesheet" type="text/css" />
<style type="text/css" media="screen, print">
    @import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/main.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";
</style>
<style type="text/css" media="print">
    @import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/print.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";
</style>
<style type="text/css" media="screen, print">
    @import "<?php $this->text('stylepath') ?>/<?php $this->text('stylename') ?>/font-awesome.css?<?php echo $GLOBALS['wgStyleVersion'] ?>";
</style>
<script src="/bibly-hack.min.js"></script>
<link href="http://code.bib.ly/bibly.min.css" rel="stylesheet" />
<script src="/jquery.js" type="text/javascript"></script>
<script src="/Hyphenator.js" type="text/javascript"></script>
<script type="text/javascript">
    var hyphenatorSettings = {
        orphancontrol: 3,
        selectorfunction: function() {
            return $('p,li,dt,blockquote,h1,h2,h3,h4,h5,h6').get();
        }
    };
    Hyphenator.config(hyphenatorSettings);
    Hyphenator.run();
</script>
<script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

<?php print Skin::makeGlobalVariablesScript($this->data); ?>
 
<?php /*** various MediaWiki-related scripts and styles ***/ ?>
<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('stylepath') ?>/common/wikibits.js?<?php echo $GLOBALS['wgStyleVersion'] ?>"><!-- wikibits js --></script>
<?php if($this->data['jsvarurl']): ?>
<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('jsvarurl') ?>"><!-- site js --></script>
<?php endif; ?>
<?php if($this->data['pagecss']): ?>
<style type="text/css"><?php $this->html('pagecss') ?></style>
<?php endif; ?>
<?php if($this->data['usercss']): ?>
<style type="text/css"><?php $this->html('usercss') ?></style>
<?php endif; ?>
<?php if($this->data['userjs']): ?>
<script type="<?php $this->text('jsmimetype') ?>" src="<?php $this->text('userjs' ) ?>"></script>
<?php endif; ?>
<?php if($this->data['userjsprev']): ?>
<script type="<?php $this->text('jsmimetype') ?>"><?php $this->html('userjsprev') ?></script>
<?php endif; ?>
<?php if($this->data['trackbackhtml']) print $this->data['trackbackhtml']; ?>

<?php /*** Head Scripts ***/ ?>
<?php $this->html('headscripts') ?>

</head>

<body class="<?php $this->text('dir') ?> <?php $this->text('pageclass') ?> <?php $this->text('skinnameclass') ?>">
<div class="wrapper">
<h1 class="firstHeading"><?php $this->data['displaytitle']!=""?$this->html('title'):$this->text('title') ?></h1>
<?php $this->html('bodytext') ?>
</div>

<?php $this->html('bottomscripts'); /* JS call to runBodyOnloadHook */ ?>
<?php $this->html('reporttime') ?>
<?php if ( $this->data['debug'] ): ?>
<!-- Debug output:
<?php $this->text( 'debug' ); ?>

-->
<?php endif; ?>

</body>

</html>
        <?php
	}
}
