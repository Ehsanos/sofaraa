(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2babe247"],{"169a":function(t,e,i){"use strict";var n=i("5530"),s=i("2909"),a=i("ade3"),r=(i("a9e3"),i("498a"),i("caad"),i("2532"),i("d3b7"),i("7db0"),i("368e"),i("480e")),o=i("4ad4"),l=i("b848"),c=i("75eb"),u=i("e707"),d=i("e4d3"),h=i("21be"),f=i("f2e7"),m=i("a293"),p=i("58df"),v=i("d9bd"),g=i("80d2"),b=Object(p["a"])(o["a"],l["a"],c["a"],u["a"],d["a"],h["a"],f["a"]);e["a"]=b.extend({name:"v-dialog",directives:{ClickOutside:m["a"]},props:{dark:Boolean,disabled:Boolean,fullscreen:Boolean,light:Boolean,maxWidth:[String,Number],noClickAnimation:Boolean,origin:{type:String,default:"center center"},persistent:Boolean,retainFocus:{type:Boolean,default:!0},scrollable:Boolean,transition:{type:[String,Boolean],default:"dialog-transition"},width:[String,Number]},data:function(){return{activatedBy:null,animate:!1,animateTimeout:-1,isActive:!!this.value,stackMinZIndex:200,previousActiveElement:null}},computed:{classes:function(){var t;return t={},Object(a["a"])(t,"v-dialog ".concat(this.contentClass).trim(),!0),Object(a["a"])(t,"v-dialog--active",this.isActive),Object(a["a"])(t,"v-dialog--persistent",this.persistent),Object(a["a"])(t,"v-dialog--fullscreen",this.fullscreen),Object(a["a"])(t,"v-dialog--scrollable",this.scrollable),Object(a["a"])(t,"v-dialog--animated",this.animate),t},contentClasses:function(){return{"v-dialog__content":!0,"v-dialog__content--active":this.isActive}},hasActivator:function(){return Boolean(!!this.$slots.activator||!!this.$scopedSlots.activator)}},watch:{isActive:function(t){var e;t?(this.show(),this.hideScroll()):(this.removeOverlay(),this.unbind(),null==(e=this.previousActiveElement)||e.focus())},fullscreen:function(t){this.isActive&&(t?(this.hideScroll(),this.removeOverlay(!1)):(this.showScroll(),this.genOverlay()))}},created:function(){this.$attrs.hasOwnProperty("full-width")&&Object(v["e"])("full-width",this)},beforeMount:function(){var t=this;this.$nextTick((function(){t.isBooted=t.isActive,t.isActive&&t.show()}))},beforeDestroy:function(){"undefined"!==typeof window&&this.unbind()},methods:{animateClick:function(){var t=this;this.animate=!1,this.$nextTick((function(){t.animate=!0,window.clearTimeout(t.animateTimeout),t.animateTimeout=window.setTimeout((function(){return t.animate=!1}),150)}))},closeConditional:function(t){var e=t.target;return!(this._isDestroyed||!this.isActive||this.$refs.content.contains(e)||this.overlay&&e&&!this.overlay.$el.contains(e))&&this.activeZIndex>=this.getMaxZIndex()},hideScroll:function(){this.fullscreen?document.documentElement.classList.add("overflow-y-hidden"):u["a"].options.methods.hideScroll.call(this)},show:function(){var t=this;!this.fullscreen&&!this.hideOverlay&&this.genOverlay(),this.$nextTick((function(){t.$nextTick((function(){t.$refs.content.contains(document.activeElement)||(t.previousActiveElement=document.activeElement,t.$refs.content.focus()),t.bind()}))}))},bind:function(){window.addEventListener("focusin",this.onFocusin)},unbind:function(){window.removeEventListener("focusin",this.onFocusin)},onClickOutside:function(t){this.$emit("click:outside",t),this.persistent?this.noClickAnimation||this.animateClick():this.isActive=!1},onKeydown:function(t){if(t.keyCode===g["z"].esc&&!this.getOpenDependents().length)if(this.persistent)this.noClickAnimation||this.animateClick();else{this.isActive=!1;var e=this.getActivator();this.$nextTick((function(){return e&&e.focus()}))}this.$emit("keydown",t)},onFocusin:function(t){if(t&&this.retainFocus){var e=t.target;if(e&&![document,this.$refs.content].includes(e)&&!this.$refs.content.contains(e)&&this.activeZIndex>=this.getMaxZIndex()&&!this.getOpenDependentElements().some((function(t){return t.contains(e)}))){var i=this.$refs.content.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'),n=Object(s["a"])(i).find((function(t){return!t.hasAttribute("disabled")}));n&&n.focus()}}},genContent:function(){var t=this;return this.showLazyContent((function(){return[t.$createElement(r["a"],{props:{root:!0,light:t.light,dark:t.dark}},[t.$createElement("div",{class:t.contentClasses,attrs:Object(n["a"])({role:"dialog",tabindex:t.isActive?0:void 0,"aria-modal":t.hideOverlay?void 0:"true"},t.getScopeIdAttrs()),on:{keydown:t.onKeydown},style:{zIndex:t.activeZIndex},ref:"content"},[t.genTransition()])])]}))},genTransition:function(){var t=this.genInnerContent();return this.transition?this.$createElement("transition",{props:{name:this.transition,origin:this.origin,appear:!0}},[t]):t},genInnerContent:function(){var t={class:this.classes,ref:"dialog",directives:[{name:"click-outside",value:{handler:this.onClickOutside,closeConditional:this.closeConditional,include:this.getOpenDependentElements}},{name:"show",value:this.isActive}],style:{transformOrigin:this.origin}};return this.fullscreen||(t.style=Object(n["a"])(Object(n["a"])({},t.style),{},{maxWidth:Object(g["h"])(this.maxWidth),width:Object(g["h"])(this.width)})),this.$createElement("div",t,this.getContentSlot())}},render:function(t){return t("div",{staticClass:"v-dialog__container",class:{"v-dialog__container--attached":""===this.attach||!0===this.attach||"attach"===this.attach}},[this.genActivator(),this.genContent()])}})},"2bfd":function(t,e,i){},"368e":function(t,e,i){},"4bd4":function(t,e,i){"use strict";var n=i("5530"),s=(i("caad"),i("2532"),i("07ac"),i("4de4"),i("d3b7"),i("159b"),i("7db0"),i("58df")),a=i("7e2b"),r=i("3206");e["a"]=Object(s["a"])(a["a"],Object(r["b"])("form")).extend({name:"v-form",provide:function(){return{form:this}},inheritAttrs:!1,props:{disabled:Boolean,lazyValidation:Boolean,readonly:Boolean,value:Boolean},data:function(){return{inputs:[],watchers:[],errorBag:{}}},watch:{errorBag:{handler:function(t){var e=Object.values(t).includes(!0);this.$emit("input",!e)},deep:!0,immediate:!0}},methods:{watchInput:function(t){var e=this,i=function(t){return t.$watch("hasError",(function(i){e.$set(e.errorBag,t._uid,i)}),{immediate:!0})},n={_uid:t._uid,valid:function(){},shouldValidate:function(){}};return this.lazyValidation?n.shouldValidate=t.$watch("shouldValidate",(function(s){s&&(e.errorBag.hasOwnProperty(t._uid)||(n.valid=i(t)))})):n.valid=i(t),n},validate:function(){return 0===this.inputs.filter((function(t){return!t.validate(!0)})).length},reset:function(){this.inputs.forEach((function(t){return t.reset()})),this.resetErrorBag()},resetErrorBag:function(){var t=this;this.lazyValidation&&setTimeout((function(){t.errorBag={}}),0)},resetValidation:function(){this.inputs.forEach((function(t){return t.resetValidation()})),this.resetErrorBag()},register:function(t){this.inputs.push(t),this.watchers.push(this.watchInput(t))},unregister:function(t){var e=this.inputs.find((function(e){return e._uid===t._uid}));if(e){var i=this.watchers.find((function(t){return t._uid===e._uid}));i&&(i.valid(),i.shouldValidate()),this.watchers=this.watchers.filter((function(t){return t._uid!==e._uid})),this.inputs=this.inputs.filter((function(t){return t._uid!==e._uid})),this.$delete(this.errorBag,e._uid)}}},render:function(t){var e=this;return t("form",{staticClass:"v-form",attrs:Object(n["a"])({novalidate:!0},this.attrs$),on:{submit:function(t){return e.$emit("submit",t)}}},this.$slots.default)}})},"615b":function(t,e,i){},"7e4c":function(t,e,i){"use strict";i.r(e);var n=function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("v-dialog",{attrs:{persistent:"","max-width":"550"},scopedSlots:t._u([{key:"activator",fn:function(e){var n=e.on,s=e.attrs;return[i("v-icon",t._g(t._b({attrs:{color:"primary",small:""}},"v-icon",s,!1),n),[t._v(" mdi-pencil ")])]}}]),model:{value:t.dialog,callback:function(e){t.dialog=e},expression:"dialog"}},[i("v-form",{ref:"form",attrs:{"lazy-validation":""},model:{value:t.valid,callback:function(e){t.valid=e},expression:"valid"}},[i("v-card",[i("v-card-title",[i("span",{staticClass:"text-h5"},[t._v("Edit User")])]),i("v-card-text",[i("v-container",[i("v-row",[i("v-col",{attrs:{cols:"12",sm:"12",md:"12"}},[i("v-text-field",{attrs:{"prepend-inner-icon":"mdi-account-outline",rules:t.nameRules,label:" User name*",required:"",counter:t.user.name},model:{value:t.user.name,callback:function(e){t.$set(t.user,"name",e)},expression:"user.name"}})],1),i("v-col",{attrs:{cols:"12"}},[i("v-text-field",{attrs:{"prepend-inner-icon":"mdi-email-outline",rules:t.emailRules,label:"Email*",required:""},model:{value:t.user.email,callback:function(e){t.$set(t.user,"email",e)},expression:"user.email"}})],1),i("v-col",{attrs:{cols:"12"}},[i("v-text-field",{attrs:{rules:t.passwordRules,"append-icon":t.value?"mdi-eye":"mdi-eye-off","prepend-inner-icon":"mdi-lock-outline",label:"Password (optional)",type:t.value?"password":"text",counter:t.user.password,required:""},on:{"click:append":function(){return t.value=!t.value}},model:{value:t.user.password,callback:function(e){t.$set(t.user,"password",e)},expression:"user.password"}})],1),i("v-col",{attrs:{cols:"12",sm:"12"}},[i("v-autocomplete",{attrs:{rules:t.roleRules,label:"Implementation role",items:t.allRole,"item-text":"name","item-value":"id"},scopedSlots:t._u([{key:"selection",fn:function(e){return[i("v-chip",t._b({class:t.getColor(e.item.id),attrs:{"input-value":e.name,close:""},on:{click:e.select,"click:close":function(i){return t.remove(e.item)}}},"v-chip",e.attrs,!1),[t._v(" "+t._s(e.item.name)+" ")])]}}]),model:{value:t.user.role_id,callback:function(e){t.$set(t.user,"role_id",e)},expression:"user.role_id"}})],1)],1)],1),i("small",[t._v("*indicates required field")])],1),i("v-card-actions",[i("v-spacer"),i("v-btn",{attrs:{color:"blue darken-1",text:""},on:{click:function(e){t.dialog=!1}}},[t._v(" Close ")]),i("v-btn",{attrs:{color:"secondary",text:""},on:{click:t.UpdateUser}},[t.progressUpdateUser?t._e():i("span",[t._v("Update User")]),t.progressUpdateUser?i("v-progress-circular",{attrs:{color:"primary",indeterminate:""}}):t._e()],1)],1)],1)],1)],1)},s=[],a=i("1da1"),r=(i("ac1f"),i("00b4"),i("96cf"),i("72b0")),o={props:["item"],methods:{remove:function(){this.user.role_id=null},getRoles:function(){var t=Object(a["a"])(regeneratorRuntime.mark((function t(){var e;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return t.next=2,r["a"].getRoles();case 2:e=t.sent,this.allRole=e;case 4:case"end":return t.stop()}}),t,this)})));function e(){return t.apply(this,arguments)}return e}(),UpdateUser:function(){var t=Object(a["a"])(regeneratorRuntime.mark((function t(){return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:if(!this.$refs.form.validate()){t.next=7;break}return this.progressUpdateUser=!0,t.next=4,r["a"].updateUser(this.user);case 4:this.progressUpdateUser=!1,this.dialog=!1,this.$emit("getVal");case 7:case"end":return t.stop()}}),t,this)})));function e(){return t.apply(this,arguments)}return e}(),getColor:function(t){return 1==t?"primary":2==t?"secondary":3==t?"red":""}},data:function(){return{valid:!0,value:!1,progressUpdateUser:!1,allRole:[],roleRules:[function(t){return!!t||"Choose at least role"}],passwordRules:[function(t){return!/[ ]/.test(t)||"no spaces allowed"}],nameRules:[function(t){return!!t||"the name field is required"}],emailRules:[function(t){return!!t||"E-mail is required"},function(t){return/.+@.+/.test(t)||"E-mail must be valid"},function(t){return!/[ ]/.test(t)||"no spaces allowed"}],user:this.item,dialog:!1}},watch:{dialog:function(t){t&&this.getRoles()}}},l=o,c=i("2877"),u=i("6544"),d=i.n(u),h=i("c6a6"),f=i("8336"),m=i("b0af"),p=i("99d9"),v=i("cc20"),g=i("62ad"),b=i("a523"),I=i("169a"),x=i("4bd4"),y=i("132d"),w=i("490a"),S=i("0fd9"),C=i("2fa4"),O=i("8654"),k=Object(c["a"])(l,n,s,!1,null,null,null);e["default"]=k.exports;d()(k,{VAutocomplete:h["a"],VBtn:f["a"],VCard:m["a"],VCardActions:p["a"],VCardText:p["c"],VCardTitle:p["d"],VChip:v["a"],VCol:g["a"],VContainer:b["a"],VDialog:I["a"],VForm:x["a"],VIcon:y["a"],VProgressCircular:w["a"],VRow:S["a"],VSpacer:C["a"],VTextField:O["a"]})},"99d9":function(t,e,i){"use strict";i.d(e,"a",(function(){return a})),i.d(e,"b",(function(){return r})),i.d(e,"c",(function(){return o})),i.d(e,"d",(function(){return l}));var n=i("b0af"),s=i("80d2"),a=Object(s["j"])("v-card__actions"),r=Object(s["j"])("v-card__subtitle"),o=Object(s["j"])("v-card__text"),l=Object(s["j"])("v-card__title");n["a"]},b0af:function(t,e,i){"use strict";var n=i("5530"),s=(i("a9e3"),i("0481"),i("4069"),i("615b"),i("10d2")),a=i("297c"),r=i("1c87"),o=i("58df");e["a"]=Object(o["a"])(a["a"],r["a"],s["a"]).extend({name:"v-card",props:{flat:Boolean,hover:Boolean,img:String,link:Boolean,loaderHeight:{type:[Number,String],default:4},raised:Boolean},computed:{classes:function(){return Object(n["a"])(Object(n["a"])({"v-card":!0},r["a"].options.computed.classes.call(this)),{},{"v-card--flat":this.flat,"v-card--hover":this.hover,"v-card--link":this.isClickable,"v-card--loading":this.loading,"v-card--disabled":this.disabled,"v-card--raised":this.raised},s["a"].options.computed.classes.call(this))},styles:function(){var t=Object(n["a"])({},s["a"].options.computed.styles.call(this));return this.img&&(t.background='url("'.concat(this.img,'") center center / cover no-repeat')),t}},methods:{genProgress:function(){var t=a["a"].options.methods.genProgress.call(this);return t?this.$createElement("div",{staticClass:"v-card__progress",key:"progress"},[t]):null}},render:function(t){var e=this.generateRouteLink(),i=e.tag,n=e.data;return n.style=this.styles,this.isClickable&&(n.attrs=n.attrs||{},n.attrs.tabindex=0),t(i,this.setBackgroundColor(this.color,n),[this.genProgress(),this.$slots.default])}})},c6a6:function(t,e,i){"use strict";var n=i("5530"),s=(i("d81d"),i("d3b7"),i("4de4"),i("498a"),i("7db0"),i("c740"),i("caad"),i("2532"),i("2bfd"),i("b974")),a=i("8654"),r=i("d9f7"),o=i("80d2"),l=Object(n["a"])(Object(n["a"])({},s["b"]),{},{offsetY:!0,offsetOverflow:!0,transition:!1});e["a"]=s["a"].extend({name:"v-autocomplete",props:{allowOverflow:{type:Boolean,default:!0},autoSelectFirst:{type:Boolean,default:!1},filter:{type:Function,default:function(t,e,i){return i.toLocaleLowerCase().indexOf(e.toLocaleLowerCase())>-1}},hideNoData:Boolean,menuProps:{type:s["a"].options.props.menuProps.type,default:function(){return l}},noFilter:Boolean,searchInput:{type:String}},data:function(){return{lazySearch:this.searchInput}},computed:{classes:function(){return Object(n["a"])(Object(n["a"])({},s["a"].options.computed.classes.call(this)),{},{"v-autocomplete":!0,"v-autocomplete--is-selecting-index":this.selectedIndex>-1})},computedItems:function(){return this.filteredItems},selectedValues:function(){var t=this;return this.selectedItems.map((function(e){return t.getValue(e)}))},hasDisplayedItems:function(){var t=this;return this.hideSelected?this.filteredItems.some((function(e){return!t.hasItem(e)})):this.filteredItems.length>0},currentRange:function(){return null==this.selectedItem?0:String(this.getText(this.selectedItem)).length},filteredItems:function(){var t=this;return!this.isSearching||this.noFilter||null==this.internalSearch?this.allItems:this.allItems.filter((function(e){var i=Object(o["s"])(e,t.itemText),n=null!=i?String(i):"";return t.filter(e,String(t.internalSearch),n)}))},internalSearch:{get:function(){return this.lazySearch},set:function(t){this.lazySearch!==t&&(this.lazySearch=t,this.$emit("update:search-input",t))}},isAnyValueAllowed:function(){return!1},isDirty:function(){return this.searchIsDirty||this.selectedItems.length>0},isSearching:function(){return this.multiple&&this.searchIsDirty||this.searchIsDirty&&this.internalSearch!==this.getText(this.selectedItem)},menuCanShow:function(){return!!this.isFocused&&(this.hasDisplayedItems||!this.hideNoData)},$_menuProps:function(){var t=s["a"].options.computed.$_menuProps.call(this);return t.contentClass="v-autocomplete__content ".concat(t.contentClass||"").trim(),Object(n["a"])(Object(n["a"])({},l),t)},searchIsDirty:function(){return null!=this.internalSearch&&""!==this.internalSearch},selectedItem:function(){var t=this;return this.multiple?null:this.selectedItems.find((function(e){return t.valueComparator(t.getValue(e),t.getValue(t.internalValue))}))},listData:function(){var t=s["a"].options.computed.listData.call(this);return t.props=Object(n["a"])(Object(n["a"])({},t.props),{},{items:this.virtualizedItems,noFilter:this.noFilter||!this.isSearching||!this.filteredItems.length,searchInput:this.internalSearch}),t}},watch:{filteredItems:"onFilteredItemsChanged",internalValue:"setSearch",isFocused:function(t){t?(document.addEventListener("copy",this.onCopy),this.$refs.input&&this.$refs.input.select()):(document.removeEventListener("copy",this.onCopy),this.blur(),this.updateSelf())},isMenuActive:function(t){!t&&this.hasSlot&&(this.lazySearch=null)},items:function(t,e){e&&e.length||!this.hideNoData||!this.isFocused||this.isMenuActive||!t.length||this.activateMenu()},searchInput:function(t){this.lazySearch=t},internalSearch:"onInternalSearchChanged",itemText:"updateSelf"},created:function(){this.setSearch()},destroyed:function(){document.removeEventListener("copy",this.onCopy)},methods:{onFilteredItemsChanged:function(t,e){var i=this;if(t!==e){if(!this.autoSelectFirst){var n=e[this.$refs.menu.listIndex];n?this.setMenuIndex(t.findIndex((function(t){return t===n}))):this.setMenuIndex(-1),this.$emit("update:list-index",this.$refs.menu.listIndex)}this.$nextTick((function(){i.internalSearch&&(1===t.length||i.autoSelectFirst)&&(i.$refs.menu.getTiles(),i.autoSelectFirst&&t.length&&(i.setMenuIndex(0),i.$emit("update:list-index",i.$refs.menu.listIndex)))}))}},onInternalSearchChanged:function(){this.updateMenuDimensions()},updateMenuDimensions:function(){this.isMenuActive&&this.$refs.menu&&this.$refs.menu.updateDimensions()},changeSelectedIndex:function(t){this.searchIsDirty||(this.multiple&&t===o["z"].left?-1===this.selectedIndex?this.selectedIndex=this.selectedItems.length-1:this.selectedIndex--:this.multiple&&t===o["z"].right?this.selectedIndex>=this.selectedItems.length-1?this.selectedIndex=-1:this.selectedIndex++:t!==o["z"].backspace&&t!==o["z"].delete||this.deleteCurrentItem())},deleteCurrentItem:function(){var t=this.selectedIndex,e=this.selectedItems[t];if(this.isInteractive&&!this.getDisabled(e)){var i=this.selectedItems.length-1;if(-1!==this.selectedIndex||0===i){var n=this.selectedItems.length,s=t!==n-1?t:t-1,a=this.selectedItems[s];a?this.selectItem(e):this.setValue(this.multiple?[]:null),this.selectedIndex=s}else this.selectedIndex=i}},clearableCallback:function(){this.internalSearch=null,s["a"].options.methods.clearableCallback.call(this)},genInput:function(){var t=a["a"].options.methods.genInput.call(this);return t.data=Object(r["a"])(t.data,{attrs:{"aria-activedescendant":Object(o["q"])(this.$refs.menu,"activeTile.id"),autocomplete:Object(o["q"])(t.data,"attrs.autocomplete","off")},domProps:{value:this.internalSearch}}),t},genInputSlot:function(){var t=s["a"].options.methods.genInputSlot.call(this);return t.data.attrs.role="combobox",t},genSelections:function(){return this.hasSlot||this.multiple?s["a"].options.methods.genSelections.call(this):[]},onClick:function(t){this.isInteractive&&(this.selectedIndex>-1?this.selectedIndex=-1:this.onFocus(),this.isAppendInner(t.target)||this.activateMenu())},onInput:function(t){if(!(this.selectedIndex>-1)&&t.target){var e=t.target,i=e.value;e.value&&this.activateMenu(),this.multiple||""!==i||this.deleteCurrentItem(),this.internalSearch=i,this.badInput=e.validity&&e.validity.badInput}},onKeyDown:function(t){var e=t.keyCode;!t.ctrlKey&&[o["z"].home,o["z"].end].includes(e)||s["a"].options.methods.onKeyDown.call(this,t),this.changeSelectedIndex(e)},onSpaceDown:function(t){},onTabDown:function(t){s["a"].options.methods.onTabDown.call(this,t),this.updateSelf()},onUpDown:function(t){t.preventDefault(),this.activateMenu()},selectItem:function(t){s["a"].options.methods.selectItem.call(this,t),this.setSearch()},setSelectedItems:function(){s["a"].options.methods.setSelectedItems.call(this),this.isFocused||this.setSearch()},setSearch:function(){var t=this;this.$nextTick((function(){t.multiple&&t.internalSearch&&t.isMenuActive||(t.internalSearch=!t.selectedItems.length||t.multiple||t.hasSlot?null:t.getText(t.selectedItem))}))},updateSelf:function(){(this.searchIsDirty||this.internalValue)&&(this.multiple||this.valueComparator(this.internalSearch,this.getValue(this.internalValue))||this.setSearch())},hasItem:function(t){return this.selectedValues.indexOf(this.getValue(t))>-1},onCopy:function(t){var e,i;if(-1!==this.selectedIndex){var n=this.selectedItems[this.selectedIndex],s=this.getText(n);null==(e=t.clipboardData)||e.setData("text/plain",s),null==(i=t.clipboardData)||i.setData("text/vnd.vuetify.autocomplete.item+plain",s),t.preventDefault()}}}})}}]);
//# sourceMappingURL=chunk-2babe247.48d7b41c.js.map