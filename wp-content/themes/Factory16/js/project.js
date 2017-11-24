(function (lib, img, cjs, ss, an) {

var p; // shortcut to reference prototypes
lib.webFontTxtInst = {}; 
var loadedTypekitCount = 0;
var loadedGoogleCount = 0;
var gFontsUpdateCacheList = [];
var tFontsUpdateCacheList = [];
lib.ssMetadata = [];



lib.updateListCache = function (cacheList) {		
	for(var i = 0; i < cacheList.length; i++) {		
		if(cacheList[i].cacheCanvas)		
			cacheList[i].updateCache();		
	}		
};		

lib.addElementsToCache = function (textInst, cacheList) {		
	var cur = textInst;		
	while(cur != exportRoot) {		
		if(cacheList.indexOf(cur) != -1)		
			break;		
		cur = cur.parent;		
	}		
	if(cur != exportRoot) {		
		var cur2 = textInst;		
		var index = cacheList.indexOf(cur);		
		while(cur2 != cur) {		
			cacheList.splice(index, 0, cur2);		
			cur2 = cur2.parent;		
			index++;		
		}		
	}		
	else {		
		cur = textInst;		
		while(cur != exportRoot) {		
			cacheList.push(cur);		
			cur = cur.parent;		
		}		
	}		
};		

lib.gfontAvailable = function(family, totalGoogleCount) {		
	lib.properties.webfonts[family] = true;		
	var txtInst = lib.webFontTxtInst && lib.webFontTxtInst[family] || [];		
	for(var f = 0; f < txtInst.length; ++f)		
		lib.addElementsToCache(txtInst[f], gFontsUpdateCacheList);		

	loadedGoogleCount++;		
	if(loadedGoogleCount == totalGoogleCount) {		
		lib.updateListCache(gFontsUpdateCacheList);		
	}		
};		

lib.tfontAvailable = function(family, totalTypekitCount) {		
	lib.properties.webfonts[family] = true;		
	var txtInst = lib.webFontTxtInst && lib.webFontTxtInst[family] || [];		
	for(var f = 0; f < txtInst.length; ++f)		
		lib.addElementsToCache(txtInst[f], tFontsUpdateCacheList);		

	loadedTypekitCount++;		
	if(loadedTypekitCount == totalTypekitCount) {		
		lib.updateListCache(tFontsUpdateCacheList);		
	}		
};
// symbols:



(lib.back_1 = function() {
	this.initialize(img.back_1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,858,482);


(lib.fig_1_1 = function() {
	this.initialize(img.fig_1_1);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,471,353);


(lib.fig_1_2 = function() {
	this.initialize(img.fig_1_2);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,341,201);


(lib.fig_1_3 = function() {
	this.initialize(img.fig_1_3);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,213,190);


(lib.fig_1_4 = function() {
	this.initialize(img.fig_1_4);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,123,106);


(lib.line_up = function() {
	this.initialize(img.line_up);
}).prototype = p = new cjs.Bitmap();
p.nominalBounds = new cjs.Rectangle(0,0,870,718);// helper functions:

function mc_symbol_clone() {
	var clone = this._cloneProps(new this.constructor(this.mode, this.startPosition, this.loop));
	clone.gotoAndStop(this.currentFrame);
	clone.paused = this.paused;
	clone.framerate = this.framerate;
	return clone;
}

function getMCSymbolPrototype(symbol, nominalBounds, frameBounds) {
	var prototype = cjs.extend(symbol, cjs.MovieClip);
	prototype.clone = mc_symbol_clone;
	prototype.nominalBounds = nominalBounds;
	prototype.frameBounds = frameBounds;
	return prototype;
	}


(lib.tail2 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["rgba(244,19,150,0)","#F41396"],[0,1],-66.6,0,66.7,0).s().p("AqZDFIAAmJIUzAAIAAGJg");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.tail2, new cjs.Rectangle(-66.6,-19.7,133.3,39.5), null);


(lib.tail1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.lf(["rgba(249,204,97,0)","#F9CC61"],[0,1],-66.6,0,66.7,0).s().p("AqZDFIAAmJIUzAAIAAGJg");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.tail1, new cjs.Rectangle(-66.6,-19.7,133.3,39.5), null);


(lib.Symbol6 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#F41396").s().p("AiLCLQg5g5AAhSQAAhRA5g6QA6g5BRAAQBSAAA5A5QA6A6AABRQAABSg6A5Qg5A6hSAAQhRAAg6g6g");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.Symbol6, new cjs.Rectangle(-19.7,-19.7,39.5,39.5), null);


(lib.Symbol5 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#F9CC61").s().p("AiLCLQg5g5AAhSQAAhRA5g6QA6g5BRAAQBSAAA5A5QA6A6AABRQAABSg6A5Qg5A6hSAAQhRAAg6g6g");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.Symbol5, new cjs.Rectangle(-19.7,-19.7,39.5,39.5), null);


(lib.Symbol1copy = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(2,0,0,3).p("AAAlRIAAKj");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.Symbol1copy, new cjs.Rectangle(-1,-34.7,2,69.5), null);


(lib.Symbol1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FFFFFF").ss(2,0,0,3).p("AgiCuIBFlb");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.Symbol1, new cjs.Rectangle(-4.5,-18.4,9.1,36.8), null);


(lib.superback = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#120D3D").s().p("EmGnGGoMAAAsNPMMNPAAAMAAAMNPg");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.superback, new cjs.Rectangle(-2500,-2500,5000,5000), null);


(lib.stars = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.back_1();
	this.instance.parent = this;
	this.instance.setTransform(-429,-241);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.stars, new cjs.Rectangle(-429,-241,858,482), null);


(lib._img = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.line_up();
	this.instance.parent = this;
	this.instance.setTransform(-435,-359);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib._img, new cjs.Rectangle(-435,-359,870,718), null);


(lib.gLogo_inner = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#6702B0").s().p("AmiA3QgIgDgGgGIgBgBIABgCIAFgFIACgBIABABQAFAFAGACQAGACAGAAQAKAAAHgFQAFgGABgLIgBAAQgFAEgFACQgFACgHAAQgKAAgHgEQgJgFgEgIQgEgIgBgJQABgLAEgIQAEgIAJgFQAHgEAKAAQAHAAAFACQAGACAEAFIABAAIABgGIABgBIABgBIAGAAIACABIAAABIAAA4QAAALgEAIQgEAIgHAFQgJAEgKAAQgJAAgIgDgAmdgXQgFADgDAFQgDAGAAAIQAAAGADAGQADAFAFADQAFADAHAAQAHAAAFgCQAGgDAEgFIAAgbQgEgGgGgDQgFgCgHAAQgHAAgFADgAGGAfQgGgCgEgEIgBAAIgBAFIAAACIgCAAIgGAAIgCAAIAAgCIAAhVIAAgCIACAAIAIAAIACAAIAAACIAAAaQAFgEAFgCQAFgCAHAAQAKAAAIAEQAHAFAFAIQAEAIAAALQAAAJgEAIQgFAIgHAFQgIAEgKAAQgHAAgFgCgAGGgYQgGADgEAFIAAAcQAEAFAGADQAFACAHAAQAHAAAFgDQAFgDADgFQADgGAAgGQAAgIgDgGQgDgFgFgDQgFgDgHAAQgHAAgFACgADZAdQgJgFgEgIQgFgIAAgJQAAgLAFgIQAEgIAJgEQAIgFAKAAQAKAAAIAFQAIAEAEAIQAFAIABALQgBAJgFAIQgEAIgIAFQgIAEgKAAQgKAAgIgEgADegXQgFADgDAGQgDAGAAAHQAAAGADAFQADAGAFADQAGADAHAAQAHAAAGgDQAFgDADgGQADgFAAgGQAAgHgDgGQgDgGgFgDQgGgDgHAAQgHAAgGADgAA5AfQgFgCgEgEIgBAAIgBAFIgBACIgCAAIgFAAIgCAAIgBgCIAAhVIABgCIACAAIAHAAIACAAIAAACIAAAaQAFgEAFgCQAGgCAGAAQAKAAAIAEQAIAFAFAIQAEAIAAALQAAAJgEAIQgFAIgIAFQgIAEgKAAQgGAAgGgCgAA5gYQgFADgFAFIAAAcQAFAFAFADQAGACAGAAQAHAAAGgDQAEgDADgFQAEgGAAgGQAAgIgEgGQgDgFgEgDQgGgDgHAAQgGAAgGACgAhaAbQgGgGABgKIAAgkIgJAAIgBgBIAAgBIAAgGIAAgCIABAAIAJgBIABgOIAAgCIABAAIAIAAIABAAIAAACIAAAOIAUAAIABABIABABIAAAHIgBABIgBABIgUAAIAAAkQABAFACADQADADAFAAIAFAAIAEgCIACAAIABABIACAGQAAAAAAAAQAAABAAAAQAAAAAAABQAAAAAAAAIgIADIgHABQgLAAgFgGgAj8AdQgIgFgFgIQgEgIgBgJQABgLAEgIQAFgIAIgEQAIgFAKAAQALAAAHAFQAIAEAFAIQAEAIAAALIAAACIAAACIgCAAIg4AAQABAGADAEQADAFAFACQAGACAGAAQAGAAAGgCQAGgCAEgEIABAAIABAAIAGAGIAAACIAAABQgIAFgHADQgHACgIAAQgLAAgIgEgAjTgHQAAgFgDgFQgEgEgEgDQgGgCgGAAQgGAAgFACQgFADgDAEQgDAEgBAGIAuAAIAAAAg");
	this.shape.setTransform(0,-0.1,1,1,0,0,0,0,-0.1);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.gLogo_inner, new cjs.Rectangle(-43.6,-5.8,87.3,11.6), null);


(lib.f4_inn = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.fig_1_2();
	this.instance.parent = this;
	this.instance.setTransform(-170.5,-100.5);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.f4_inn, new cjs.Rectangle(-170.5,-100.5,341,201), null);


(lib.f3_inn = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.fig_1_3();
	this.instance.parent = this;
	this.instance.setTransform(-106.5,-95);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.f3_inn, new cjs.Rectangle(-106.5,-95,213,190), null);


(lib.f2_inn = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.fig_1_4();
	this.instance.parent = this;
	this.instance.setTransform(-61.5,-53);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.f2_inn, new cjs.Rectangle(-61.5,-53,123,106), null);


(lib.f1_inn = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.fig_1_1();
	this.instance.parent = this;
	this.instance.setTransform(-235.5,-176.5);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.f1_inn, new cjs.Rectangle(-235.5,-176.5,471,353), null);


(lib.t3 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.inn = new lib.f3_inn();
	this.inn.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.inn).wait(1));

}).prototype = getMCSymbolPrototype(lib.t3, new cjs.Rectangle(-106.5,-95,213,190), null);


(lib.t2_inn = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_0 = function() {
		this.stop();
	}
	this.frame_116 = function() {
		this.stop();
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(116).call(this.frame_116).wait(1));

	// Layer 2
	this.instance = new lib.Symbol1copy();
	this.instance.parent = this;
	this.instance.setTransform(-185,80);
	this.instance.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance).to({y:14,alpha:1},18,cjs.Ease.get(1)).wait(1).to({x:-184.9},0).wait(1).to({x:-184.7},0).wait(1).to({x:-184.4},0).wait(1).to({x:-183.9},0).wait(1).to({x:-183.2},0).wait(1).to({x:-182.4},0).wait(1).to({x:-181.4},0).wait(1).to({x:-180.2},0).wait(1).to({x:-178.8},0).wait(1).to({x:-177.2},0).wait(1).to({x:-175.3},0).wait(1).to({x:-173.2},0).wait(1).to({x:-170.8},0).wait(1).to({x:-168.2},0).wait(1).to({x:-165.2},0).wait(1).to({x:-161.9},0).wait(1).to({x:-158.2},0).wait(1).to({x:-154.2},0).wait(1).to({x:-149.7},0).wait(1).to({x:-144.8},0).wait(1).to({x:-139.4},0).wait(1).to({x:-133.5},0).wait(1).to({x:-127},0).wait(1).to({x:-119.9},0).wait(1).to({x:-112.2},0).wait(1).to({x:-103.8},0).wait(1).to({x:-94.7},0).wait(1).to({x:-84.9},0).wait(1).to({x:-74.4},0).wait(1).to({x:-63.2},0).wait(1).to({x:-51.4},0).wait(1).to({x:-39.2},0).wait(1).to({x:-26.6},0).wait(1).to({x:-14},0).wait(1).to({x:-1.3},0).wait(1).to({x:11.1},0).wait(1).to({x:23.2},0).wait(1).to({x:34.9},0).wait(1).to({x:45.9},0).wait(1).to({x:56.4},0).wait(1).to({x:66.3},0).wait(1).to({x:75.5},0).wait(1).to({x:84.1},0).wait(1).to({x:92.2},0).wait(1).to({x:99.7},0).wait(1).to({x:106.7},0).wait(1).to({x:113.2},0).wait(1).to({x:119.3},0).wait(1).to({x:124.9},0).wait(1).to({x:130.1},0).wait(1).to({x:135},0).wait(1).to({x:139.5},0).wait(1).to({x:143.7},0).wait(1).to({x:147.6},0).wait(1).to({x:151.3},0).wait(1).to({x:154.6},0).wait(1).to({x:157.8},0).wait(1).to({x:160.6},0).wait(1).to({x:163.3},0).wait(1).to({x:165.8},0).wait(1).to({x:168.1},0).wait(1).to({x:170.1},0).wait(1).to({x:172.1},0).wait(1).to({x:173.8},0).wait(1).to({x:175.4},0).wait(1).to({x:176.9},0).wait(1).to({x:178.2},0).wait(1).to({x:179.3},0).wait(1).to({x:180.4},0).wait(1).to({x:181.3},0).wait(1).to({x:182.1},0).wait(1).to({x:182.8},0).wait(1).to({x:183.4},0).wait(1).to({x:183.9},0).wait(1).to({x:184.3},0).wait(1).to({x:184.6},0).wait(1).to({x:184.8},0).wait(1).to({x:185},0).wait(1).to({y:-51,alpha:0},18,cjs.Ease.get(-1)).to({_off:true},1).wait(1));

	// Layer 3 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	var mask_graphics_18 = new cjs.Graphics().p("EgyMAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_19 = new cjs.Graphics().p("EgyMAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_20 = new cjs.Graphics().p("EgyLAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_21 = new cjs.Graphics().p("EgyJAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_22 = new cjs.Graphics().p("EgyHAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_23 = new cjs.Graphics().p("EgyEAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_24 = new cjs.Graphics().p("EgyAAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_25 = new cjs.Graphics().p("Egx6AGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_26 = new cjs.Graphics().p("Egx0AGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_27 = new cjs.Graphics().p("EgxtAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_28 = new cjs.Graphics().p("EgxlAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_29 = new cjs.Graphics().p("EgxcAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_30 = new cjs.Graphics().p("EgxSAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_31 = new cjs.Graphics().p("EgxGAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_32 = new cjs.Graphics().p("Egw4AGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_33 = new cjs.Graphics().p("EgwqAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_34 = new cjs.Graphics().p("EgwZAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_35 = new cjs.Graphics().p("EgwHAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_36 = new cjs.Graphics().p("EgvzAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_37 = new cjs.Graphics().p("EgvcAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_38 = new cjs.Graphics().p("EgvEAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_39 = new cjs.Graphics().p("EgupAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_40 = new cjs.Graphics().p("EguLAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_41 = new cjs.Graphics().p("EgtrAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_42 = new cjs.Graphics().p("EgtIAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_43 = new cjs.Graphics().p("EgshAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_44 = new cjs.Graphics().p("Egr3AGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_45 = new cjs.Graphics().p("EgrKAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_46 = new cjs.Graphics().p("EgqZAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_47 = new cjs.Graphics().p("EgpkAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_48 = new cjs.Graphics().p("EgosAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_49 = new cjs.Graphics().p("EgnxAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_50 = new cjs.Graphics().p("Egm0AGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_51 = new cjs.Graphics().p("Egl2AGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_52 = new cjs.Graphics().p("Egk2AGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_53 = new cjs.Graphics().p("Egj3AGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_54 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_55 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_56 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_57 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_58 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_59 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_60 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_61 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_62 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_63 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_64 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_65 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_66 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_67 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_68 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_69 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_70 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_71 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_72 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_73 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_74 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_75 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_76 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_77 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_78 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_79 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_80 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_81 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_82 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_83 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_84 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_85 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_86 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_87 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_88 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_89 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_90 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_91 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_92 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_93 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_94 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_95 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_96 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");
	var mask_graphics_97 = new cjs.Graphics().p("EgjwAGUIAAsnMBHhAAAIAAMng");

	this.timeline.addTween(cjs.Tween.get(mask).to({graphics:null,x:0,y:0}).wait(18).to({graphics:mask_graphics_18,x:-321.3,y:14.2}).wait(1).to({graphics:mask_graphics_19,x:-321.3,y:14.2}).wait(1).to({graphics:mask_graphics_20,x:-321.2,y:14.2}).wait(1).to({graphics:mask_graphics_21,x:-321,y:14.2}).wait(1).to({graphics:mask_graphics_22,x:-320.8,y:14.2}).wait(1).to({graphics:mask_graphics_23,x:-320.5,y:14.2}).wait(1).to({graphics:mask_graphics_24,x:-320.1,y:14.2}).wait(1).to({graphics:mask_graphics_25,x:-319.5,y:14.2}).wait(1).to({graphics:mask_graphics_26,x:-318.9,y:14.2}).wait(1).to({graphics:mask_graphics_27,x:-318.2,y:14.2}).wait(1).to({graphics:mask_graphics_28,x:-317.4,y:14.2}).wait(1).to({graphics:mask_graphics_29,x:-316.5,y:14.2}).wait(1).to({graphics:mask_graphics_30,x:-315.5,y:14.2}).wait(1).to({graphics:mask_graphics_31,x:-314.3,y:14.2}).wait(1).to({graphics:mask_graphics_32,x:-312.9,y:14.2}).wait(1).to({graphics:mask_graphics_33,x:-311.5,y:14.2}).wait(1).to({graphics:mask_graphics_34,x:-309.8,y:14.2}).wait(1).to({graphics:mask_graphics_35,x:-308,y:14.2}).wait(1).to({graphics:mask_graphics_36,x:-306,y:14.2}).wait(1).to({graphics:mask_graphics_37,x:-303.7,y:14.2}).wait(1).to({graphics:mask_graphics_38,x:-301.3,y:14.2}).wait(1).to({graphics:mask_graphics_39,x:-298.6,y:14.2}).wait(1).to({graphics:mask_graphics_40,x:-295.6,y:14.2}).wait(1).to({graphics:mask_graphics_41,x:-292.4,y:14.2}).wait(1).to({graphics:mask_graphics_42,x:-288.9,y:14.2}).wait(1).to({graphics:mask_graphics_43,x:-285,y:14.2}).wait(1).to({graphics:mask_graphics_44,x:-280.8,y:14.2}).wait(1).to({graphics:mask_graphics_45,x:-276.3,y:14.2}).wait(1).to({graphics:mask_graphics_46,x:-271.4,y:14.2}).wait(1).to({graphics:mask_graphics_47,x:-266.1,y:14.2}).wait(1).to({graphics:mask_graphics_48,x:-260.5,y:14.2}).wait(1).to({graphics:mask_graphics_49,x:-254.6,y:14.2}).wait(1).to({graphics:mask_graphics_50,x:-248.5,y:14.2}).wait(1).to({graphics:mask_graphics_51,x:-242.3,y:14.2}).wait(1).to({graphics:mask_graphics_52,x:-235.9,y:14.2}).wait(1).to({graphics:mask_graphics_53,x:-229.6,y:14.2}).wait(1).to({graphics:mask_graphics_54,x:-217.9,y:14.2}).wait(1).to({graphics:mask_graphics_55,x:-205.8,y:14.2}).wait(1).to({graphics:mask_graphics_56,x:-194.2,y:14.2}).wait(1).to({graphics:mask_graphics_57,x:-183.2,y:14.2}).wait(1).to({graphics:mask_graphics_58,x:-172.7,y:14.2}).wait(1).to({graphics:mask_graphics_59,x:-162.9,y:14.2}).wait(1).to({graphics:mask_graphics_60,x:-153.6,y:14.2}).wait(1).to({graphics:mask_graphics_61,x:-145,y:14.2}).wait(1).to({graphics:mask_graphics_62,x:-137,y:14.2}).wait(1).to({graphics:mask_graphics_63,x:-129.5,y:14.2}).wait(1).to({graphics:mask_graphics_64,x:-122.5,y:14.2}).wait(1).to({graphics:mask_graphics_65,x:-116,y:14.2}).wait(1).to({graphics:mask_graphics_66,x:-109.9,y:14.2}).wait(1).to({graphics:mask_graphics_67,x:-104.3,y:14.2}).wait(1).to({graphics:mask_graphics_68,x:-99.1,y:14.2}).wait(1).to({graphics:mask_graphics_69,x:-94.2,y:14.2}).wait(1).to({graphics:mask_graphics_70,x:-89.7,y:14.2}).wait(1).to({graphics:mask_graphics_71,x:-85.5,y:14.2}).wait(1).to({graphics:mask_graphics_72,x:-81.6,y:14.2}).wait(1).to({graphics:mask_graphics_73,x:-78,y:14.2}).wait(1).to({graphics:mask_graphics_74,x:-74.6,y:14.2}).wait(1).to({graphics:mask_graphics_75,x:-71.5,y:14.2}).wait(1).to({graphics:mask_graphics_76,x:-68.6,y:14.2}).wait(1).to({graphics:mask_graphics_77,x:-66,y:14.2}).wait(1).to({graphics:mask_graphics_78,x:-63.5,y:14.2}).wait(1).to({graphics:mask_graphics_79,x:-61.2,y:14.2}).wait(1).to({graphics:mask_graphics_80,x:-59.1,y:14.2}).wait(1).to({graphics:mask_graphics_81,x:-57.2,y:14.2}).wait(1).to({graphics:mask_graphics_82,x:-55.5,y:14.2}).wait(1).to({graphics:mask_graphics_83,x:-53.9,y:14.2}).wait(1).to({graphics:mask_graphics_84,x:-52.4,y:14.2}).wait(1).to({graphics:mask_graphics_85,x:-51.1,y:14.2}).wait(1).to({graphics:mask_graphics_86,x:-49.9,y:14.2}).wait(1).to({graphics:mask_graphics_87,x:-48.9,y:14.2}).wait(1).to({graphics:mask_graphics_88,x:-48,y:14.2}).wait(1).to({graphics:mask_graphics_89,x:-47.2,y:14.2}).wait(1).to({graphics:mask_graphics_90,x:-46.5,y:14.2}).wait(1).to({graphics:mask_graphics_91,x:-45.9,y:14.2}).wait(1).to({graphics:mask_graphics_92,x:-45.4,y:14.2}).wait(1).to({graphics:mask_graphics_93,x:-45,y:14.2}).wait(1).to({graphics:mask_graphics_94,x:-44.7,y:14.2}).wait(1).to({graphics:mask_graphics_95,x:-44.5,y:14.2}).wait(1).to({graphics:mask_graphics_96,x:-44.3,y:14.2}).wait(1).to({graphics:mask_graphics_97,x:-44.3,y:14.2}).wait(20));

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("AjaELQgGAAgEgDQgDgEAAgHIAAn5QAAgHADgEQAEgDAGAAIBXAAQAGAAAEADQADAEAAAHIAACBICMAAQA+ABAwAaQAvAZAaAsQAbAsAAA2QAAA5gbAsQgaAsgvAZQgwAag+AAgAh2CgICNAAQAvgBAYgaQAYgZAAglQAAgngYgZQgYgXgvAAIiNAAg");
	this.shape.setTransform(154.5,12.5);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AgqELQgHAAgDgDQgEgEAAgHIAAmbIiqAAQgHAAgDgEQgEgEAAgGIAAhQQAAgHAEgEQADgDAHAAIHFAAQAHAAADADQAEAEAAAHIAABQQAAAGgEAEQgDAEgHAAIiqAAIAAGbQAAAHgEAEQgDADgHAAg");
	this.shape_1.setTransform(99.3,12.5);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AC/ELQgIAAgFgDQgFgEgDgHIglhcIkKAAIglBeQgCAHgEACQgEADgHAAIhgAAQgIAAgCgDQgDgEADgHIDnn/QABgDAEgDQACgCAGAAIBuAAQAFAAAEACIAEAGIDdH9QACAGgDAFQgEAEgGABgABeA7IhWjcIgKAAIhZDcIC5AAg");
	this.shape_2.setTransform(40.2,12.5);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("AlBELQgFAAgEgDQgEgEAAgHIAAn5QAAgHADgEQAEgDAGAAIBUAAQAHAAAEADQADAEAAAHIAAGcICoAAIAAmcQAAgHADgEQAEgDAHAAIBTAAQAGAAAEADQAEAEAAAHIAAGcICoAAIAAmcQAAgHADgEQAEgDAGAAIBUAAQAHAAAEADQADAEAAAHIAAH5QAAAHgDAEQgEADgHAAg");
	this.shape_3.setTransform(-32.2,12.5);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("AjKELQgGAAgEgDQgDgEAAgHIAAn5QAAgHAEgDQAEgEAFAAIGNAAQAGAAAEADQADAEAAAHIAABOQAAAHgDADQgEADgGAAIkoAAIAABlIEEAAQAGAAAEADQADAEAAAGIAABOQAAAGgDAEQgEAEgGgBIkEAAIAAB0IEvAAQAHAAAEAEQADAEAAAGIAABPQAAAHgDAEQgEADgHAAg");
	this.shape_4.setTransform(-98.1,12.5);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AjZELQgHAAgDgDQgEgEAAgHIAAn5QAAgHAEgEQADgDAHAAIDxAAQA8AAAuAbQAvAZAbArQAbAtABA2QgBA6gbAsQgbArgvAaQguAag8AAIiNAAIAACAQAAAHgEAEQgDADgHAAgAh1ARICNAAQAtgBAYgWQAZgaAAgoQAAgmgZgYQgYgYgtAAIiNAAg");
	this.shape_5.setTransform(-152.7,12.5);

	var maskedShapeInstanceList = [this.shape,this.shape_1,this.shape_2,this.shape_3,this.shape_4,this.shape_5];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask;
	}

	this.timeline.addTween(cjs.Tween.get({}).to({state:[]}).to({state:[{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]},18).wait(99));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-186,45.3,2,69.5);


(lib.t1_inn = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_0 = function() {
		this.stop();
	}
	this.frame_116 = function() {
		this.stop();
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(116).call(this.frame_116).wait(1));

	// Layer 2
	this.instance = new lib.Symbol1();
	this.instance.parent = this;
	this.instance.setTransform(-141.1,-58.4);
	this.instance.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance).to({x:-152.6,y:4.2,alpha:1},18,cjs.Ease.get(1)).wait(2).to({x:-152.4},0).wait(1).to({x:-152.1},0).wait(1).to({x:-151.7},0).wait(1).to({x:-151.2},0).wait(1).to({x:-150.5},0).wait(1).to({x:-149.6},0).wait(1).to({x:-148.6},0).wait(1).to({x:-147.5},0).wait(1).to({x:-146.1},0).wait(1).to({x:-144.6},0).wait(1).to({x:-142.8},0).wait(1).to({x:-140.8},0).wait(1).to({x:-138.6},0).wait(1).to({x:-136.1},0).wait(1).to({x:-133.4},0).wait(1).to({x:-130.3},0).wait(1).to({x:-127},0).wait(1).to({x:-123.3},0).wait(1).to({x:-119.2},0).wait(1).to({x:-114.7},0).wait(1).to({x:-109.7},0).wait(1).to({x:-104.3},0).wait(1).to({x:-98.4},0).wait(1).to({x:-92},0).wait(1).to({x:-84.9},0).wait(1).to({x:-77.4},0).wait(1).to({x:-69.2},0).wait(1).to({x:-60.4},0).wait(1).to({x:-51.1},0).wait(1).to({x:-41.3},0).wait(1).to({x:-31.1},0).wait(1).to({x:-20.6},0).wait(1).to({x:-10},0).wait(1).to({x:0.5},0).wait(1).to({x:10.9},0).wait(1).to({x:21},0).wait(1).to({x:30.7},0).wait(1).to({x:39.9},0).wait(1).to({x:48.6},0).wait(1).to({x:56.9},0).wait(1).to({x:64.6},0).wait(1).to({x:71.8},0).wait(1).to({x:78.5},0).wait(1).to({x:84.7},0).wait(1).to({x:90.6},0).wait(1).to({x:96},0).wait(1).to({x:101},0).wait(1).to({x:105.7},0).wait(1).to({x:110.1},0).wait(1).to({x:114.2},0).wait(1).to({x:117.9},0).wait(1).to({x:121.4},0).wait(1).to({x:124.7},0).wait(1).to({x:127.7},0).wait(1).to({x:130.5},0).wait(1).to({x:133.1},0).wait(1).to({x:135.5},0).wait(1).to({x:137.8},0).wait(1).to({x:139.8},0).wait(1).to({x:141.7},0).wait(1).to({x:143.5},0).wait(1).to({x:145.1},0).wait(1).to({x:146.5},0).wait(1).to({x:147.9},0).wait(1).to({x:149.1},0).wait(1).to({x:150.2},0).wait(1).to({x:151.1},0).wait(1).to({x:152},0).wait(1).to({x:152.8},0).wait(1).to({x:153.5},0).wait(1).to({x:154},0).wait(1).to({x:154.5},0).wait(1).to({x:155},0).wait(1).to({x:155.3},0).wait(1).to({x:155.5},0).wait(1).to({x:155.7},0).wait(1).to({x:155.8},0).wait(1).to({x:155.9},0).to({x:163.9,y:-39.8,alpha:0},18,cjs.Ease.get(-1)).to({_off:true},1).wait(1));

	// Layer 3 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	var mask_graphics_18 = new cjs.Graphics().p("EgoYACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_19 = new cjs.Graphics().p("EgoYACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_20 = new cjs.Graphics().p("EgoXACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_21 = new cjs.Graphics().p("EgoVACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_22 = new cjs.Graphics().p("EgoTACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_23 = new cjs.Graphics().p("EgoRACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_24 = new cjs.Graphics().p("EgoNACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_25 = new cjs.Graphics().p("EgoJACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_26 = new cjs.Graphics().p("EgoEACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_27 = new cjs.Graphics().p("Egn+ACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_28 = new cjs.Graphics().p("Egn3ACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_29 = new cjs.Graphics().p("EgnwACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_30 = new cjs.Graphics().p("EgnnACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_31 = new cjs.Graphics().p("EgndACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_32 = new cjs.Graphics().p("EgnSACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_33 = new cjs.Graphics().p("EgnFACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_34 = new cjs.Graphics().p("Egm4ACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_35 = new cjs.Graphics().p("EgmoACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_36 = new cjs.Graphics().p("EgmYACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_37 = new cjs.Graphics().p("EgmFACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_38 = new cjs.Graphics().p("EglxACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_39 = new cjs.Graphics().p("EglaACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_40 = new cjs.Graphics().p("EglBACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_41 = new cjs.Graphics().p("EgkmACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_42 = new cjs.Graphics().p("EgkJACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_43 = new cjs.Graphics().p("EgjpACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_44 = new cjs.Graphics().p("EgjFACuIAAlbMA5YAAAIhHFbg");
	var mask_graphics_45 = new cjs.Graphics().p("EgigACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_46 = new cjs.Graphics().p("Egh3ACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_47 = new cjs.Graphics().p("EghLACuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_48 = new cjs.Graphics().p("EggcACuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_49 = new cjs.Graphics().p("A/rCuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_50 = new cjs.Graphics().p("A+4CuIAAlbMA5YAAAIhGFbg");
	var mask_graphics_51 = new cjs.Graphics().p("A+ECuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_52 = new cjs.Graphics().p("A9PCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_53 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_54 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_55 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_56 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_57 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_58 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_59 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_60 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_61 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_62 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_63 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_64 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_65 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_66 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_67 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_68 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_69 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_70 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_71 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_72 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_73 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_74 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_75 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_76 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_77 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_78 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_79 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_80 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_81 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_82 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_83 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_84 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_85 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_86 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_87 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_88 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_89 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_90 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_91 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_92 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_93 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_94 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_95 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_96 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");
	var mask_graphics_97 = new cjs.Graphics().p("A8sCuIAAlbMA5ZAAAIhHFbg");

	this.timeline.addTween(cjs.Tween.get(mask).to({graphics:null,x:0,y:0}).wait(18).to({graphics:mask_graphics_18,x:-258.5,y:4.2}).wait(1).to({graphics:mask_graphics_19,x:-258.5,y:4.2}).wait(1).to({graphics:mask_graphics_20,x:-258.4,y:4.2}).wait(1).to({graphics:mask_graphics_21,x:-258.2,y:4.2}).wait(1).to({graphics:mask_graphics_22,x:-258,y:4.2}).wait(1).to({graphics:mask_graphics_23,x:-257.8,y:4.2}).wait(1).to({graphics:mask_graphics_24,x:-257.4,y:4.2}).wait(1).to({graphics:mask_graphics_25,x:-257,y:4.2}).wait(1).to({graphics:mask_graphics_26,x:-256.5,y:4.2}).wait(1).to({graphics:mask_graphics_27,x:-255.9,y:4.2}).wait(1).to({graphics:mask_graphics_28,x:-255.2,y:4.2}).wait(1).to({graphics:mask_graphics_29,x:-254.5,y:4.2}).wait(1).to({graphics:mask_graphics_30,x:-253.6,y:4.2}).wait(1).to({graphics:mask_graphics_31,x:-252.6,y:4.2}).wait(1).to({graphics:mask_graphics_32,x:-251.5,y:4.2}).wait(1).to({graphics:mask_graphics_33,x:-250.2,y:4.2}).wait(1).to({graphics:mask_graphics_34,x:-248.9,y:4.2}).wait(1).to({graphics:mask_graphics_35,x:-247.3,y:4.2}).wait(1).to({graphics:mask_graphics_36,x:-245.7,y:4.2}).wait(1).to({graphics:mask_graphics_37,x:-243.8,y:4.2}).wait(1).to({graphics:mask_graphics_38,x:-241.8,y:4.2}).wait(1).to({graphics:mask_graphics_39,x:-239.5,y:4.2}).wait(1).to({graphics:mask_graphics_40,x:-237,y:4.2}).wait(1).to({graphics:mask_graphics_41,x:-234.3,y:4.2}).wait(1).to({graphics:mask_graphics_42,x:-231.4,y:4.2}).wait(1).to({graphics:mask_graphics_43,x:-228.2,y:4.2}).wait(1).to({graphics:mask_graphics_44,x:-224.6,y:4.2}).wait(1).to({graphics:mask_graphics_45,x:-220.9,y:4.2}).wait(1).to({graphics:mask_graphics_46,x:-216.8,y:4.2}).wait(1).to({graphics:mask_graphics_47,x:-212.4,y:4.2}).wait(1).to({graphics:mask_graphics_48,x:-207.7,y:4.2}).wait(1).to({graphics:mask_graphics_49,x:-202.8,y:4.2}).wait(1).to({graphics:mask_graphics_50,x:-197.7,y:4.2}).wait(1).to({graphics:mask_graphics_51,x:-192.5,y:4.2}).wait(1).to({graphics:mask_graphics_52,x:-187.2,y:4.2}).wait(1).to({graphics:mask_graphics_53,x:-180.2,y:4.2}).wait(1).to({graphics:mask_graphics_54,x:-169.8,y:4.2}).wait(1).to({graphics:mask_graphics_55,x:-159.7,y:4.2}).wait(1).to({graphics:mask_graphics_56,x:-150,y:4.2}).wait(1).to({graphics:mask_graphics_57,x:-140.8,y:4.2}).wait(1).to({graphics:mask_graphics_58,x:-132,y:4.2}).wait(1).to({graphics:mask_graphics_59,x:-123.8,y:4.2}).wait(1).to({graphics:mask_graphics_60,x:-116.1,y:4.2}).wait(1).to({graphics:mask_graphics_61,x:-108.9,y:4.2}).wait(1).to({graphics:mask_graphics_62,x:-102.2,y:4.2}).wait(1).to({graphics:mask_graphics_63,x:-95.9,y:4.2}).wait(1).to({graphics:mask_graphics_64,x:-90.1,y:4.2}).wait(1).to({graphics:mask_graphics_65,x:-84.7,y:4.2}).wait(1).to({graphics:mask_graphics_66,x:-79.6,y:4.2}).wait(1).to({graphics:mask_graphics_67,x:-74.9,y:4.2}).wait(1).to({graphics:mask_graphics_68,x:-70.6,y:4.2}).wait(1).to({graphics:mask_graphics_69,x:-66.5,y:4.2}).wait(1).to({graphics:mask_graphics_70,x:-62.7,y:4.2}).wait(1).to({graphics:mask_graphics_71,x:-59.2,y:4.2}).wait(1).to({graphics:mask_graphics_72,x:-56,y:4.2}).wait(1).to({graphics:mask_graphics_73,x:-52.9,y:4.2}).wait(1).to({graphics:mask_graphics_74,x:-50.1,y:4.2}).wait(1).to({graphics:mask_graphics_75,x:-47.5,y:4.2}).wait(1).to({graphics:mask_graphics_76,x:-45.1,y:4.2}).wait(1).to({graphics:mask_graphics_77,x:-42.9,y:4.2}).wait(1).to({graphics:mask_graphics_78,x:-40.9,y:4.2}).wait(1).to({graphics:mask_graphics_79,x:-39,y:4.2}).wait(1).to({graphics:mask_graphics_80,x:-37.2,y:4.2}).wait(1).to({graphics:mask_graphics_81,x:-35.6,y:4.2}).wait(1).to({graphics:mask_graphics_82,x:-34.2,y:4.2}).wait(1).to({graphics:mask_graphics_83,x:-32.8,y:4.2}).wait(1).to({graphics:mask_graphics_84,x:-31.6,y:4.2}).wait(1).to({graphics:mask_graphics_85,x:-30.5,y:4.2}).wait(1).to({graphics:mask_graphics_86,x:-29.5,y:4.2}).wait(1).to({graphics:mask_graphics_87,x:-28.7,y:4.2}).wait(1).to({graphics:mask_graphics_88,x:-27.9,y:4.2}).wait(1).to({graphics:mask_graphics_89,x:-27.2,y:4.2}).wait(1).to({graphics:mask_graphics_90,x:-26.6,y:4.2}).wait(1).to({graphics:mask_graphics_91,x:-26.1,y:4.2}).wait(1).to({graphics:mask_graphics_92,x:-25.7,y:4.2}).wait(1).to({graphics:mask_graphics_93,x:-25.4,y:4.2}).wait(1).to({graphics:mask_graphics_94,x:-25.1,y:4.2}).wait(1).to({graphics:mask_graphics_95,x:-25,y:4.2}).wait(1).to({graphics:mask_graphics_96,x:-24.9,y:4.2}).wait(1).to({graphics:mask_graphics_97,x:-24.8,y:4.2}).wait(20));

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFFFFF").s().p("ABAB5IAWhrIAWhoIgBAAIh8DTIgNAAIgpjSIgBAAIgSBnIgWBrIgTAAIAxjxIAZAAIAnDUIABAAIB8jUIAZAAIgxDxg");
	this.shape.setTransform(140.5,1.1);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFFFFF").s().p("AAhB5IAUhjIg/AAIhFBjIgVAAIBKhpQgUgIgJgPQgIgPAGgZQAGgiAZgUQAagTAgAAIBFAAIgxDxgAgQhZQgRAOgFAbQgFAYAMAPQALAOAWAAIA2AAIAWhsIgyAAQgcAAgQAOg");
	this.shape_1.setTransform(116.4,1.1);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFFFFF").s().p("AAyB5IAtjgIhfAAIgVBcQgRBIgTAeQgTAegiAAIgHAAIAEgRIAFAAQAWAAAPgZQAQgaAPhAIAZhtICFAAIgxDxg");
	this.shape_2.setTransform(94.8,1.1);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFFFFF").s().p("ABKB5IgJhEIhmAAIgkBEIgUAAICFjxIASAAIAkDxgAgbAkIBZAAIgSiBIgBAAg");
	this.shape_3.setTransform(72.3,1.1);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFFFFF").s().p("Ag3B5IAtjgIhNAAIADgRICsAAIgDARIhNAAIgsDgg");
	this.shape_4.setTransform(57.5,1.1);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFFFFF").s().p("AheB5IAwjxICNAAIgDARIh6AAIgSBbIBrAAIgEAQIhrAAIgUBkIB7AAIgDARg");
	this.shape_5.setTransform(37.6,1.1);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFFFFF").s().p("ABCCWIAMg6IipAAIgMA6IgRAAIANhLIAQAAQAOgOAUghQASghAOg5IAWhXIB8AAIgtDgIAYAAIgRBLgAgFg+QgLAvgSAjQgRAjgTAUIB+AAIAqjPIhXAAg");
	this.shape_6.setTransform(14.3,4.1);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFFFFF").s().p("AAnB5IApjNIgBAAIimDNIgTAAIAwjxIATAAIgpDMIABABICnjNIATAAIgwDxg");
	this.shape_7.setTransform(-14.8,1.1);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFFFFF").s().p("AiNB5IAwjxIATAAIgtDgIBZAAIAsjgIAUAAIgsDgIBYAAIAtjgIATAAIgwDxg");
	this.shape_8.setTransform(-40.8,1.1);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#FFFFFF").s().p("AheB5IAwjxICNAAIgDARIh6AAIgSBbIBrAAIgEAQIhrAAIgUBkIB7AAIgDARg");
	this.shape_9.setTransform(-63.9,1.1);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#FFFFFF").s().p("AhdB5IAwjxIBNAAQAhAAARAUQAQAUgGAfQgHAigWARQgXASgkAAIg6AAIgUBlgAgzADIA6AAQAaAAASgOQARgQAFgWQAFgZgLgOQgKgPgcAAIg6AAg");
	this.shape_10.setTransform(-83.7,1.1);

	this.shape_11 = new cjs.Shape();
	this.shape_11.graphics.f("#FFFFFF").s().p("AhKBqQgVgSAIghIAAgBIASAAQgFAYANAPQAOAOAaAAQAbAAAUgOQAUgOAEgXQAGgcgNgLQgMgLgfAAIgbAAIACgIIABgFIABgDIAaAAQAbAAASgNQASgMAEgWQAFgXgMgNQgMgOgeAAQgVAAgTAPQgUAOgEAVIgSAAIAAgBQAFgfAZgRQAZgRAfAAQAhAAATARQASASgGAgQgEATgNAOQgOAPgUAHQATAFAJAPQAIAPgEAVQgHAjgZARQgaARgkAAQgeAAgUgSg");
	this.shape_11.setTransform(-103.4,1.1);

	this.shape_12 = new cjs.Shape();
	this.shape_12.graphics.f("#FFFFFF").s().p("ABKB5IgJhEIhmAAIgkBEIgUAAICFjxIASAAIAkDxgAgbAkIBZAAIgSiBIgBAAg");
	this.shape_12.setTransform(-125.1,1.1);

	this.shape_13 = new cjs.Shape();
	this.shape_13.graphics.f("#FFFFFF").s().p("AhdB5IAwjxIBNAAQAhAAARAUQAQAUgGAfQgHAigWARQgXASgkAAIg6AAIgUBlgAgzADIA6AAQAaAAASgOQARgQAFgWQAFgZgLgOQgKgPgcAAIg6AAg");
	this.shape_13.setTransform(-142.4,1.1);

	var maskedShapeInstanceList = [this.shape,this.shape_1,this.shape_2,this.shape_3,this.shape_4,this.shape_5,this.shape_6,this.shape_7,this.shape_8,this.shape_9,this.shape_10,this.shape_11,this.shape_12,this.shape_13];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask;
	}

	this.timeline.addTween(cjs.Tween.get({}).to({state:[]}).to({state:[{t:this.shape_13},{t:this.shape_12},{t:this.shape_11},{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]},18).wait(99));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-145.7,-76.8,9,36.8);


(lib.Symbol4 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.head = new lib.Symbol5();
	this.head.parent = this;
	this.head.setTransform(56.5,0);

	this.tail = new lib.tail1();
	this.tail.parent = this;
	this.tail.setTransform(57,0,1,1,0,0,0,66.6,0);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.tail},{t:this.head}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.Symbol4, new cjs.Rectangle(-76.2,-19.7,152.5,39.5), null);


(lib.Symbol3 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.head = new lib.Symbol6();
	this.head.parent = this;
	this.head.setTransform(56.5,0);

	this.tail = new lib.tail2();
	this.tail.parent = this;
	this.tail.setTransform(57,0,1,1,0,0,0,66.6,0);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.tail},{t:this.head}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.Symbol3, new cjs.Rectangle(-76.2,-19.7,152.5,39.5), null);


(lib.line_mc = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 2 (mask)
	var mask = new cjs.Shape();
	mask._off = true;
	mask.graphics.p("EAWuAo0QkCgjjsh4Qjth4i2i7QimirgrikQgoibA5inQA1ieB6h4QDRjNF3hOQDKgpCtAPQDKARCUBfQA4AkBEA9QAnAjBMBKQCOCFBuApQCKAyCvglQDrgyC2i8QCwi1BBjyQA9jngsj/Qgqjwh+jcQjcmAnQk4QithuhVg4QhBgqg2gmQhqBah/BeQigB4kzgcQkHgYjehtQlciqhAmSQgViCALiaIAAAAQAPiNACgcQAJh/g8h1Qg4huhqhUQhnhRh/goQiCgoh+ANQj7AbjADKQi7DFgjEEQhKIgi6DsQjIEAl5ggQhmgJhnghQgwgPiCg0QjshejSgNQjmgPjPCuQi8CchmD0QhFCkAECZQAECxBoBoQBIBHCWAzIB/ApQBKAZAxAYQDCBhBuDhQBiDIAID3QAFCngjCNQgpChhbByQhlB9iZAxQihA0iKg+IAEgJQCHA8CdgyQCWgxBjh6QBahxAoieQAjiMgFilQgIj1hhjGQhsjei/hgQgxgYhJgZIh/goQiZg0hJhJQhrhrgEi1QgEibBGimQBnj2C9idQDTixDpAPQDUANDtBfQCCAzAwAQQBmAgBlAJQFzAgDFj8QC4jrBKodQAkkHC9jHQDDjND+gbQCAgNCEApQCBAoBoBSQBsBWA5BwQA9B3gJCBQgCAdgPCNQgLCYAVCBQA/GNFXCoQDdBsEFAYQEuAcCeh2QB+hdBphZQhFgygzgtQh+hthNh8QhXiNgQiRQgQiZA/inQBAirB7hcQCLhmC8AUQBwAMB1BbQCQBwAfCjQAmDNicD5QiGDVkPDpQA1AmA/ApQBWA4CsBtQHTE6DdGCQB/DeAqDyQAsEBg+DoQhBD1iyC3Qi4C+juAzQiyAmiMg0QhwgpiQiHIAAAAQhMhKgngjQhDg8g4gkQiShdjHgRQisgPjIApQl0BNjPDLQh4B2g1CcQg4CkAoCYQAqCiCkCpQC1C6DrB3QDrB3EBAjQDGAbClg9QC9hFAqifIAKACQgrCkjCBIQh0AqiEAAQg6AAg/gIgEAdhgkdQh5Bag/CpQg+CkAQCXQAQCPBWCLQBMB6B8BtQA0AtBGAyQEPjpCFjUQCaj1gljKQgeifiNhuQhyhZhugMQgfgDgdAAQiTAAhxBTg");
	mask.setTransform(6,-8);

	// Layer 3
	this.img_mc = new lib._img();
	this.img_mc.parent = this;
	this.img_mc.setTransform(1,-12);

	var maskedShapeInstanceList = [this.img_mc];

	for(var shapedInstanceItr = 0; shapedInstanceItr < maskedShapeInstanceList.length; shapedInstanceItr++) {
		maskedShapeInstanceList[shapedInstanceItr].mask = mask;
	}

	this.timeline.addTween(cjs.Tween.get(this.img_mc).wait(1));

}).prototype = getMCSymbolPrototype(lib.line_mc, new cjs.Rectangle(-334,-270,674.1,532.1), null);


(lib.glogo = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.inn = new lib.gLogo_inner();
	this.inn.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.inn).wait(1));

}).prototype = getMCSymbolPrototype(lib.glogo, new cjs.Rectangle(-43.6,-5.8,87.3,11.6), null);


(lib.flyY = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.inner = new lib.Symbol4();
	this.inner.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.inner).wait(1));

}).prototype = getMCSymbolPrototype(lib.flyY, new cjs.Rectangle(-76.2,-19.7,152.5,39.5), null);


(lib.flyP = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.inner = new lib.Symbol3();
	this.inner.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.inner).wait(1));

}).prototype = getMCSymbolPrototype(lib.flyP, new cjs.Rectangle(-76.2,-19.7,152.5,39.5), null);


(lib.flyC = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.fl8 = new lib.flyP();
	this.fl8.parent = this;
	this.fl8.setTransform(-702.1,204);

	this.fl7 = new lib.flyY();
	this.fl7.parent = this;
	this.fl7.setTransform(-708.1,146);

	this.fl6 = new lib.flyP();
	this.fl6.parent = this;
	this.fl6.setTransform(-702.1,93);

	this.fl5 = new lib.flyY();
	this.fl5.parent = this;
	this.fl5.setTransform(-708.1,35);

	this.fl4 = new lib.flyP();
	this.fl4.parent = this;
	this.fl4.setTransform(-702.1,-27);

	this.fl3 = new lib.flyY();
	this.fl3.parent = this;
	this.fl3.setTransform(-708.1,-85);

	this.fl2 = new lib.flyP();
	this.fl2.parent = this;
	this.fl2.setTransform(-702.1,-146);

	this.fl1 = new lib.flyY();
	this.fl1.parent = this;
	this.fl1.setTransform(-708.1,-204);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.fl1},{t:this.fl2},{t:this.fl3},{t:this.fl4},{t:this.fl5},{t:this.fl6},{t:this.fl7},{t:this.fl8}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.flyC, new cjs.Rectangle(-784.4,-223.8,158.5,447.6), null);


(lib.f4 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.inn = new lib.f4_inn();
	this.inn.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.inn).wait(1));

}).prototype = getMCSymbolPrototype(lib.f4, new cjs.Rectangle(-170.5,-100.5,341,201), null);


(lib.f2 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.inn = new lib.f2_inn();
	this.inn.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.inn).wait(1));

}).prototype = getMCSymbolPrototype(lib.f2, new cjs.Rectangle(-61.5,-53,123,106), null);


(lib.f1 = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.inn = new lib.f1_inn();
	this.inn.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.inn).wait(1));

}).prototype = getMCSymbolPrototype(lib.f1, new cjs.Rectangle(-235.5,-176.5,471,353), null);


(lib.txt = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.inn2 = new lib.t2_inn();
	this.inn2.parent = this;
	this.inn2.setTransform(57.5,1);

	this.inn1 = new lib.t1_inn();
	this.inn1.parent = this;
	this.inn1.setTransform(-49.8,-41.8);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.inn1},{t:this.inn2}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.txt, new cjs.Rectangle(-195.5,-118.6,69,234.4), null);


(lib.main_mc = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// timeline functions:
	this.frame_0 = function() {
		this.stop();
		stg.myPlay = function(){ 
			stg.play(); 
			};
		//stg.ln.visible = false
		var duration = 5;
		var easeF = Expo	
			
		
		TweenMax.from(stg.ln.img_mc,  5, {delay:.0, rotation:140, scaleX:.3, scaleY:.2, ease:Sine.easeOut });
		var CW = 50
		TweenMax.to(stg.ln.img_mc, 5, {bezier:{type:'quadratic', values:[/*p1*/{x:0, y:0},{x:CW, y:0},{x:CW, y:CW},  /*p2*/{x:CW, y:CW*2},{x:0, y:CW*2},  /*p3*/{x:-CW, y:CW*2},{x:-CW, y:CW},  /*p4*/{x:-30, y:0},{x:0, y:0}]}/*bezier end*/, repeat:-1, ease:Linear.easeNone});
		
		TweenMax.from(stg.gLogo,  1, {delay:3.0, alpha:0,  ease:Linear.easeNone }); 
		
		
		TweenMax.from(stg.f4,  duration, {delay:0.0,  x:"+=100", y:"+=200", scaleX:3, scaleY:3, ease:easeF.easeOut }); 
		TweenMax.from(stg.f3,  duration, {delay:0.0,  x:"+=500", y:"-=300", scaleX:3, scaleY:3, ease:easeF.easeOut }); 
		TweenMax.from(stg.f2,  duration, {delay:0.0,  x:"+=200", y:"-=200", scaleX:2, scaleY:2, ease:easeF.easeOut }); 
		TweenMax.from(stg.f1,  duration, {delay:0.0,  x:"-=100", y:"-=50", scaleX:1.5, scaleY:1.5, ease:easeF.easeOut }); 
		TweenMax.from(stg.txt, duration, {delay:0.0,  x:"+=0", y:"+=0", scaleX:3, scaleY:3, ease:easeF.easeOut }); 
		
		TweenMax.from(stg.stars,  7, {delay:0.0, scaleX:.95, scaleY:.95, ease:easeF.easeOut }); 
		
		TweenMax.from(stg.f4,  15, {delay:0.0, rotation:10, yoyo:true, repeat:-1, ease:Sine.easeInOut }); 
		TweenMax.from(stg.f3,  25, {delay:0.0, rotation:-10, yoyo:true, repeat:-1, ease:Sine.easeInOut }); 
		TweenMax.from(stg.f1,  10, {delay:0.0, rotation:5, yoyo:true, repeat:-1, ease:Sine.easeInOut }); 
		
		TweenMax.to(stg.superback,  .5, {delay:0.0, alpha:0, ease:Linear.easeNone }); 
		
		
		TweenMax.delayedCall(1, function(){
			stg.txt.inn1.play();
			})
			
		TweenMax.delayedCall(2, function(){
			stg.txt.inn2.play();
			})
		
		stg.moveObjs = function(xPos, yPos){
		
			TweenMax.to(stg.f4.inn, 2.2, {delay:0.0,  x:xPos/20, y:yPos/20, rotation:xPos/300, ease:Sine.easeOut }); 
			
			TweenMax.to(stg.f3.inn, 2.2, {delay:0.0,  x:xPos/30, y:yPos/30, rotation:-yPos/300, ease:Sine.easeOut }); 
		
			TweenMax.to(stg.txt, 2.2, {delay:0.0,     x:xPos/40, y:yPos/40,  ease:Sine.easeOut }); 
		
			TweenMax.to(stg.f2.inn, 2.2, {delay:0.0,  x:xPos/60, y:yPos/60, ease:Sine.easeOut }); 
			
			TweenMax.to(stg.f1.inn, 2.2, {delay:0.0,  x:xPos/100, y:yPos/100,  ease:Sine.easeOut }); 
			
			TweenMax.to(stg.flyC, 2.2, {delay:0.0,    x:xPos/100, y:yPos/100,  ease:Sine.easeOut }); 
			
			TweenMax.to(stg.ln, 2.2, {delay:0.0,      x:xPos/80, y:yPos/80, ease:Sine.easeOut }); 
			
			TweenMax.to(stg.gLogo.inn, 2.2, {delay:0.0,      x:xPos/60, y:yPos/60, ease:Sine.easeOut }); 
		
			}
		
		//stg.addEventListener("stagemousemove", stg.moveObjs)
		
			jQuery(window).mousemove(function( event ) {
		 // console.log(event)
				stg.moveObjs(-(event.pageX - stage.canvas.width/2), -(event.pageY - stage.canvas.height/2))
		});
		
		function getRandomInt(min, max) {
		    return Math.floor(Math.random() * (max - min + 1)) + min;
		}
		
		function moveFly(fly){
			
			var dir;
			var rand = Math.random()
			if ( rand > 0 && rand < .25 ){
				dir = 45;
				fly.x = getRandomInt(-700, -200)
				fly.y = getRandomInt(-300, -500)
			} else if (rand > .25 && rand < .5) {
				dir = 135;
				fly.x = getRandomInt(200, 700)
				fly.y = getRandomInt(-300, -500)
			} else if (rand > .5 && rand < .8) {
				dir = -45;
				fly.x = getRandomInt(-700, -200)
				fly.y = getRandomInt(300, 500)
			} else if(rand > .8 && rand < .95) {
				dir = -135;
				fly.x = getRandomInt(200, 700)
				fly.y = getRandomInt(300, 500)
			}
					
					
					
				fly.scaleX = fly.scaleY =  	Math.random()/2 + .5
					
					
					
					
			fly.rotation = dir		
					var del = Math.random()*5;
			TweenMax.to(fly.inner, 15.2, {delay:del,      x:300,  ease:Expo.easeOut }); 
			//TweenMax.to(fly, 35.2, {delay:del,      x:100,  ease:Sine.easeOut }); 
			TweenMax.from(fly.inner, 0.5, {delay:del,   alpha:0,  ease:Linear.easeNone }); 
			TweenMax.from(fly.inner.tail, 20.2, {delay:del+0.5,  alpha:0,  scaleX:.5,  ease:Expo.easeOut  }); 
			
			TweenMax.to(fly.inner.tail, 65.2, {delay:del,      x:200,  ease:Sine.easeOut }); 
			TweenMax.to(fly.inner.head, 65.2, {delay:del,      x:200,  ease:Sine.easeOut }); 
		
			}
		
		moveFly(stg.flyC.fl1)
		moveFly(stg.flyC.fl2)
		moveFly(stg.flyC.fl3)
		moveFly(stg.flyC.fl4)
		moveFly(stg.flyC.fl5)
		moveFly(stg.flyC.fl6)
		moveFly(stg.flyC.fl7)
		moveFly(stg.flyC.fl8)
		//fade
		/*
		
		var del1 = 1;
		TweenMax.to(stg.t1_1, 0.3, {delay: del1 + 1.2, x:"+=0", y:"+=0", rotation:"+=0", alpha:0, repeat:-1, yoyo:true, scaleX:2, scaleY:2, ease:Back.easeIn, onComplete: stg.myPlay }); 
		*/
	}

	// actions tween:
	this.timeline.addTween(cjs.Tween.get(this).call(this.frame_0).wait(1));

	// Layer 4
	this.superback = new lib.superback();
	this.superback.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.superback).wait(1));

	// 444
	this.gLogo = new lib.glogo();
	this.gLogo.parent = this;
	this.gLogo.setTransform(115.6,-224.3);

	this.f4 = new lib.f4();
	this.f4.parent = this;
	this.f4.setTransform(44.5,146.5);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.f4},{t:this.gLogo}]}).wait(1));

	// Layer 2
	this.f3 = new lib.t3();
	this.f3.parent = this;
	this.f3.setTransform(218.5,-99);

	this.timeline.addTween(cjs.Tween.get(this.f3).wait(1));

	// line
	this.ln = new lib.line_mc();
	this.ln.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.ln).wait(1));

	// 3
	this.f2 = new lib.f2();
	this.f2.parent = this;
	this.f2.setTransform(113.5,-141);

	this.timeline.addTween(cjs.Tween.get(this.f2).wait(1));

	// txt
	this.txt = new lib.txt();
	this.txt.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.txt).wait(1));

	// dots
	this.flyC = new lib.flyC();
	this.flyC.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.flyC).wait(1));

	// 2
	this.f1 = new lib.f1();
	this.f1.parent = this;
	this.f1.setTransform(-114.5,-79.5);

	this.timeline.addTween(cjs.Tween.get(this.f1).wait(1));

	// 1
	this.stars = new lib.stars();
	this.stars.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.stars).wait(1));

}).prototype = getMCSymbolPrototype(lib.main_mc, new cjs.Rectangle(-2500,-2500,5000,5000), null);


// stage content:
(lib.project = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// main
	this.main_mc = new lib.main_mc();
	this.main_mc.parent = this;
	this.main_mc.setTransform(590,325);

	this.timeline.addTween(cjs.Tween.get(this.main_mc).wait(1));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(-1320,-1850,5000,5000);
// library properties:
lib.properties = {
	width: 1180,
	height: 650,
	fps: 60,
	color: "#120D3D",
	opacity: 1.00,
	webfonts: {},
	manifest: [
		{src:"img/back_1.png", id:"back_1"},
		{src:"img/fig_1_1.png", id:"fig_1_1"},
		{src:"img/fig_1_2.png", id:"fig_1_2"},
		{src:"img/fig_1_3.png", id:"fig_1_3"},
		{src:"img/fig_1_4.png", id:"fig_1_4"},
		{src:"img/line_up.png", id:"line_up"}
	],
	preloads: []
};




})(lib = lib||{}, images = images||{}, createjs = createjs||{}, ss = ss||{}, AdobeAn = AdobeAn||{});
var lib, images, createjs, ss, AdobeAn;