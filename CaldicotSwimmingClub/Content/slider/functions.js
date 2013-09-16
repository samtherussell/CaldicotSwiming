
stepcarousel.setup({
	galleryid : 'mygallery', //id of carousel DIV
	beltclass : 'belt', //class of inner "belt" DIV containing all the panel DIVs
	panelclass : 'panel', //class of panel DIVs each holding content
	autostep : {
		enable : true,
		moveby : 1,
		pause : 3000
	},
	panelbehavior : {
		speed : 500,
		wraparound : true,
		wrapbehavior : 'slide',
		persist : true
	},
	defaultbuttons : {
		enable : true,
		moveby : 1,
		leftnav : [ 'media/left.jpg', -10, 110 ],
		rightnav : [ 'media/right.jpg', -20, 110 ]
	},
	statusvars : [ 'statusA', 'statusB', 'statusC' ], //register 3 variables that contain current panel (start), current panel (last), and total panels
	contenttype : [ 'inline' ]
//content setting ['inline'] or ['ajax', 'path_to_external_file']
});