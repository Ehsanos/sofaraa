(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0da75f"],{"6c62":function(n,t,e){"use strict";e.r(t);var i=function(){var n=this,t=n.$createElement,e=n._self._c||t;return e("v-col",{attrs:{cols:"12"}},[e("v-autocomplete",{attrs:{rules:n.nationRules,label:"Implementation nation *",items:n.allNation,"item-text":"name","item-value":"id"},scopedSlots:n._u([{key:"selection",fn:function(t){return[e("v-chip",n._b({staticClass:"primary",attrs:{"input-value":t.name,close:""},on:{click:t.select,"click:close":function(e){return n.remove(t.item)}}},"v-chip",t.attrs,!1),[n._v(" "+n._s(t.item.name)+" ")])]}}]),model:{value:n.nation_id,callback:function(t){n.nation_id=t},expression:"nation_id"}})],1)},a=[],o=(e("d81d"),e("b0c0"),{mounted:function(){var n=this,t=this.allNation.map((function(t){return{name:t.name[n.lang],id:t.id}}));this.allNation=t},props:["nation"],computed:{lang:function(){return this.$store.getters.lang}},data:function(){return{nation_id:this.nation,nationRules:[function(n){return!!n||"Choose at least nation"}],allNation:[{name:{en:"Turkey",ar:"تركيا",tr:"Türkiye"},id:1},{name:{en:"Syria",ar:"سوريا",tr:"Suriye"},id:2}]}},methods:{remove:function(){this.nation_id=null}},watch:{nation_id:function(n){this.$emit("changNation",n)}}}),l=o,c=e("2877"),r=e("6544"),s=e.n(r),u=e("c6a6"),m=e("cc20"),d=e("62ad"),p=Object(c["a"])(l,i,a,!1,null,null,null);t["default"]=p.exports;s()(p,{VAutocomplete:u["a"],VChip:m["a"],VCol:d["a"]})}}]);
//# sourceMappingURL=chunk-2d0da75f.00d2af1c.js.map