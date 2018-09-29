
window.onload = function() {
  Sticker.init('.sticker2');
};

/**
* forEach implementation for Objects/NodeLists/Arrays, automatic type loops and context options
*
* @private
* @author Todd Motto
* @link https://github.com/toddmotto/foreach
* @param {Array|Object|NodeList} collection - Collection of items to iterate, could be an Array, Object or NodeList
* @callback requestCallback      callback   - Callback function for each iteration.
* @param {Array|Object|NodeList} scope=null - Object/NodeList/Array that forEach is iterating over, to use as the this value when executing callback.
* @returns {}
*/
var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};

var hamburgers = document.querySelectorAll(".hamburger");
if (hamburgers.length > 0) {
  forEach(hamburgers, function(hamburger) {
    hamburger.addEventListener("click", function() {
      this.classList.toggle("is-active");
    }, false);
  });
}


// reveal mobile menu
var m_menu=$('.m_menu');
var btn_hamburger=$('.hamburger');
btn_hamburger.bind('click', function () {
  if($(this).hasClass('is-active')){
	  m_menu.fadeIn();
  }else{
	  m_menu.fadeOut();
  }
});