// found this at https://github.com/STRd6/matrix.js
/**
* Matrix.js v1.2.0
* 
* Copyright (c) 2010 STRd6
*
* Permission is hereby granted, free of charge, to any person obtaining a copy
* of this software and associated documentation files (the "Software"), to deal
* in the Software without restriction, including without limitation the rights
* to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
* copies of the Software, and to permit persons to whom the Software is
* furnished to do so, subject to the following conditions:
*
* The above copyright notice and this permission notice shall be included in
* all copies or substantial portions of the Software.
*
* THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
* IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
* AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
* LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
* OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
* THE SOFTWARE.
*
* Loosely based on flash:
* http://www.adobe.com/livedocs/flash/9.0/ActionScriptLangRefV3/flash/geom/Matrix.html
*/(function(){function e(t,n){return{x:t||0,y:n||0,equal:function(e){return this.x===e.x&&this.y===e.y},add:function(t){return e(this.x+t.x,this.y+t.y)},subtract:function(t){return e(this.x-t.x,this.y-t.y)},scale:function(t){return e(this.x*t,this.y*t)},magnitude:function(){return e.distance(e(0,0),this)}}}function t(n,r,i,s,o,u){n=n!==undefined?n:1;s=s!==undefined?s:1;return{a:n,b:r||0,c:i||0,d:s,tx:o||0,ty:u||0,concat:function(e){return t(this.a*e.a+this.c*e.b,this.b*e.a+this.d*e.b,this.a*e.c+this.c*e.d,this.b*e.c+this.d*e.d,this.a*e.tx+this.c*e.ty+this.tx,this.b*e.tx+this.d*e.ty+this.ty)},deltaTransformPoint:function(t){return e(this.a*t.x+this.c*t.y,this.b*t.x+this.d*t.y)},inverse:function(){var e=this.a*this.d-this.b*this.c;return t(this.d/e,-this.b/e,-this.c/e,this.a/e,(this.c*this.ty-this.d*this.tx)/e,(this.b*this.tx-this.a*this.ty)/e)},rotate:function(e,n){return this.concat(t.rotation(e,n))},scale:function(e,n,r){return this.concat(t.scale(e,n,r))},transformPoint:function(t){return e(this.a*t.x+this.c*t.y+this.tx,this.b*t.x+this.d*t.y+this.ty)},translate:function(e,n){return this.concat(t.translation(e,n))}}}e.distance=function(e,t){return Math.sqrt(Math.pow(t.x-e.x,2)+Math.pow(t.y-e.y,2))};e.direction=function(e,t){return Math.atan2(t.y-e.y,t.x-e.x)};t.rotation=function(e,n){var r=t(Math.cos(e),Math.sin(e),-Math.sin(e),Math.cos(e));n&&(r=t.translation(n.x,n.y).concat(r).concat(t.translation(-n.x,-n.y)));return r};t.scale=function(e,n,r){n=n||e;var i=t(e,0,0,n);r&&(i=t.translation(r.x,r.y).concat(i).concat(t.translation(-r.x,-r.y)));return i};t.translation=function(e,n){return t(1,0,0,1,e,n)};t.IDENTITY=t();t.HORIZONTAL_FLIP=t(-1,0,0,1);t.VERTICAL_FLIP=t(1,0,0,-1);window.Point=e;window.Matrix=t})();