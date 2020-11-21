<?php header('Content-Type: text/css; charset=utf-8'); ?>

/*==================================================================================================*/
/*--normalizing--*/
/*==================================================================================================*/

* { box-sizing:border-box }
*:focus { outline:none }
:root { -webkit-tap-highlight-color:rgba(0, 0, 0, 0); }
[hidden] { display:none !important }
html, body { margin:0; }
h1, h2, h3, h4, h5, h6 { margin:0; font:inherit; }
a { display:inline-block; cursor:pointer; text-decoration:none; color:inherit; }
input, textarea, select, button { font:inherit; color:inherit; background:none; border:none; }
img { max-width:100% } textarea { resize:none }
select { -webkit-appearance:none; appearance:none; }

/*==================================================================================================*/
/*--html--*/
/*==================================================================================================*/

html { height:100%; font:14px/35px Segoe UI, Consolas; overflow-y:scroll; }

body { display:flex; flex-direction:column; position:relative; min-height:100%; padding-bottom:40px; overflow-x:hidden; }

body > main { flex-grow:1; }

.container { width:700px; max-width:100%; margin:auto; padding-left:20px; padding-right:20px; }

.underline { text-decoration:underline; cursor:pointer; } .underline:hover, .underline:focus { text-decoration:none; }

.item { display:flex; border-radius:4px; padding:0 10px; margin-bottom:2px; }

.item:hover, .item:focus { background:var(--dark1) }

/*==================================================================================================*/
/*--colors--*/
/*==================================================================================================*/

<?php
	$colors = [
		"dark1"     => "rgba(0,0,0,0.1)",
		"dark2"     => "rgba(0,0,0,0.2)",
		"dark3"     => "rgba(0,0,0,0.3)",
		"dark4"     => "rgba(0,0,0,0.4)",
		"dark5"     => "rgba(0,0,0,0.5)",
		"dark6"     => "rgba(0,0,0,0.6)",
		"dark7"     => "rgba(0,0,0,0.7)",
		"dark8"     => "rgba(0,0,0,0.8)",
	];
?>

:root {
	<?php foreach ($colors as $i => $value): ?>
		--<?=$i?>:<?=$value?>;
	<?php endforeach ?>
}

<?php foreach ($colors as $i => $value): ?>

	.color-<?=$i?> { color:var(--<?=$i?>) }

	.back-<?=$i?> { background-color:var(--<?=$i?>) }

	.border-<?=$i?> { border-color:var(--<?=$i?>) }

	.hvr-color-<?=$i?>:hover { color:var(--<?=$i?>) }

	.hvr-border-<?=$i?>:hover { border-color:var(--<?=$i?>) }

	.click-back-<?=$i?>:active,
	.click-back-<?=$i?>.active { background-color:var(--<?=$i?>) }

	.hvr-outline-<?=$i?>:hover, .hvr-outline-<?=$i?>:focus,
	.hover-composition:hover .hvr-outline-<?=$i?>,
	.hover-composition:focus .hvr-outline-<?=$i?> { box-shadow:inset 0 0 0 1px var(--<?=$i?>) }

	.hvr-back-<?=$i?>:hover, .hvr-back-<?=$i?>:focus,
	.hover-composition:hover .hvr-back-<?=$i?> ,
	.hover-composition:focus .hvr-back-<?=$i?> { background-color:var(--<?=$i?>) }
	
<?php endforeach ?>

<?php foreach ($colors as $i => $value): ?>

	input:checked + .checked-back-<?=$i?> { background-color:var(--<?=$i?>)!important }

	input:checked + .checked-color-<?=$i?> { color:var(--<?=$i?>)!important }

<?php endforeach ?>

/*==================================================================================================*/
/*--inputs--*/
/*==================================================================================================*/

.input { display:block; position:relative; transition:box-shadow 0.1s, background 0.1s, color 0.1s; width:100%; }

.input { box-shadow:inset 0 0 0 2px var(--dark2); }

.input:hover, .input:focus { box-shadow:inset 0 0 0 2px var(--dark5); }

.btn { display:inline-block; position:relative; transition:box-shadow 0.1s, background 0.1s, color 0.1s; white-space:nowrap; cursor:pointer; overflow:hidden; text-overflow:ellipsis; }

.btn-sm  { line-height:25px; }

.btn-dark { background:var(--dark1); border-radius:7px; font-weight:500; text-align:center; min-width:30px; padding:0 5px; }

.btn-dark:hover, .btn-dark:focus { background:var(--dark2) }

/*==================================================================================================*/
/*--geometry--*/
/*==================================================================================================*/

<?php function all_classes($q = "") { ?>

	.row<?=$q?>   { display:flex; flex-direction:row; }
	.rowi<?=$q?>  { display:inline-flex; flex-direction:row; }
	.stk<?=$q?>   { display:flex; flex-direction:column }
	.rowrv<?=$q?> { display:flex; flex-direction:row-reverse }
	.stkrv<?=$q?> { display:flex; flex-direction:column-reverse }
	.blk<?=$q?>   { display:block }
	.blki<?=$q?>  { display:inline-block }
	.grid<?=$q?>  { display:grid; grid-template-columns:repeat(auto-fill, minmax(var(--auto-grid-min-size), 1fr)) }

	.fluid<?=$q?> { flex:1 1 0; min-height:0; min-width:0 }
	.grow<?=$q?>  { flex-grow:1; }	
	.nosh<?=$q?>  { flex-shrink:0 !important }
	.wrap<?=$q?>  { flex-wrap:wrap }

	.altp<?=$q?>  { align-items:flex-start }
	.albm<?=$q?>  { align-items:flex-end }
	.alcn<?=$q?>  { align-items:center; align-content:center; }

	.jutp<?=$q?>  { justify-content:flex-start }
	.jubm<?=$q?>  { justify-content:flex-end }
	.jucn<?=$q?>  { justify-content:center }
	.jusb<?=$q?>  { justify-content:space-between }
	.jusa<?=$q?>  { justify-content:space-around }
	.juse<?=$q?>  { justify-content:space-evenly }

	.fcn<?=$q?>   { text-align:center }
	.flf<?=$q?>   { text-align:left }
	.frg<?=$q?>   { text-align:right }
	.fjs<?=$q?>   { text-align:justify }
	.fup<?=$q?>   { text-transform:uppercase }
	.fnw<?=$q?>   { white-space:nowrap; text-overflow:ellipsis }
	.fls<?=$q?>   { letter-spacing:1px; }
	.fcp<?=$q?>   { text-transform:capitalize; }
	.fcrop<?=$q?> { white-space:nowrap; text-overflow:ellipsis; overflow:hidden; }

	.prel<?=$q?>  { position:relative }
	.pabs<?=$q?>  { position:absolute }
	.pfix<?=$q?>  { position:fixed }
	.pcen<?=$q?>  { position:absolute; top:50%; left:50%; transform:translate(-50%, -50%) }
	.pcover<?=$q?>  { top:0; bottom:0; left:0; right:0; }
	.noev<?=$q?>  { pointer-events:none }
	.mxauto<?=$q?> { margin-left:auto; margin-right:auto; }
	.cptr<?=$q?>  { cursor:pointer }
	.cnrm<?=$q?>  { cursor:auto }

	.overflowy<?=$q?> { overflow-y:auto }
	.scrolly<?=$q?> { overflow-y:scroll }
	.crop<?=$q?>  { overflow:hidden }
	.round<?=$q?> { border-radius:1000px }

	.hfull<?=$q?> { height:100% }
	.wfull<?=$q?> { width:100% }

	.maxw1<?=$q?> { max-width:100% }
	.maxh1<?=$q?> { max-height:100% }
	.minw1<?=$q?> { min-width:100% }
	.minh1<?=$q?> { min-height:100% }

	<?php for ($i = 0; $i <= 9; $i += 1) print(".op{$i}{$q} {opacity:0.{$i}}"); ?>

	<?php for ($i = 0; $i <= 100; $i += 5) print(".wg{$i}{$q} { width:{$i}% }"); ?>

	<?php for ($i = -1; $i <= 9; $i++) print(".zi{$i}{$q} { z-index:{$i} }"); ?>

	<?php for ($i = 0; $i <= 16; $i++) print(".rds$i { border-radius:{$i}px }"); ?>

	<?php for ($i = 1; $i <= 9; $i++) print(".fw{$i}{$q} { font-weight:{$i}00 }"); ?>

	<?php for ($i = 2; $i <= 60; $i++) print(".fs{$i}{$q} { font-size:{$i}px } .lh{$i}{$q} { line-height:{$i}px }"); ?>

	<?php for ($i = 0; $i <= 320; $i++) print(".w$i { width:{$i}px } .h$i { height:{$i}px }"); ?>

	<?php for ($i = 0; $i <= 200; $i++) print(".pt{$i}{$q} { padding-top:{$i}px } .pb{$i}{$q} { padding-bottom:{$i}px } .pl{$i}{$q} { padding-left:{$i}px } .pr{$i}{$q} { padding-right:{$i}px } .px{$i}{$q} { padding-left:{$i}px; padding-right:{$i}px } .py{$i}{$q} { padding-top:{$i}px; padding-bottom:{$i}px }"); ?>

	<?php for ($i = 0; $i <= 100; $i++) print(".umx{$i}{$q} { margin-left:-{$i}px; margin-right:-{$i}px;} .umt{$i}{$q} { margin-top:-{$i}px } .umb{$i}{$q} { margin-bottom:-{$i}px } .uml{$i}{$q} { margin-left:-{$i}px } .umr{$i}{$q} { margin-right:-{$i}px }"); ?>
	
<?php } ?>



/*--sm--*/
<?php all_classes("") ?>


/*--md: 768px-and-more--*/
@media (min-width:768px) {
}
/*--less-than-768px--*/
@media (max-width:767px) {
	.show-md { display:none !important }
}


/*--lg: 992px-and-more--*/
@media (min-width:992px) {
	<?php all_classes("-lg") ?>
	
	.show-sm { display:none !important }
}
/*--less-than-992px--*/
@media (max-width:991px) {
	.show-lg { display:none !important }
}
