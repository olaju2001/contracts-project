(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-2d0dd49b"],{"816b":function(t,e,s){"use strict";s.r(e);var n=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",[s("b-card",{ref:"cardAction",attrs:{title:t.$t("pages.rejectedContracts.title")}},[s("b-row",[s("b-col",{attrs:{cols:"12"}},[s("b-table",{attrs:{id:"my-table","per-page":t.perPage,"current-page":t.currentPage,"head-variant":"",hover:"",responsive:"",items:t.getContracts,fields:t.fields,bordered:""},scopedSlots:t._u([{key:"head()",fn:function(e){return[s("span",{staticClass:"text-primary",staticStyle:{"font-size":"18px"}},[t._v(t._s(e.label))])]}},{key:"table-busy",fn:function(){return[s("div",{staticClass:"text-center text-dark my-2"},[s("b-spinner",{staticClass:"align-middle"}),s("strong",[t._v(" Loading... ")])],1)]},proxy:!0},{key:"cell(id)",fn:function(e){return[t._v(" "+t._s(e.item.id)+" ")]}},{key:"cell(created_at)",fn:function(e){return[t._v(" "+t._s(new Date(e.item.created_at).toDateString())+" ")]}},{key:"cell(status)",fn:function(e){return[t._v(" "+t._s(e.item.status)+" ")]}},{key:"cell(actions)",fn:function(e){return[s("b-button",{staticClass:"mr-1",attrs:{size:"sm",variant:"primary"},on:{click:function(s){return t.showDetails(e.item.id)}}},[t._v(" "+t._s(t.$t("buttons.details"))+" ")]),s("b-button",{staticClass:"mr-1",attrs:{size:"sm",variant:"success"},on:{click:function(s){return t.confirmAccepted(e.item.id,"A")}}},[t._v(" "+t._s(t.$t("buttons.active"))+" ")]),s("b-button",{attrs:{size:"sm",variant:"danger"},on:{click:function(s){return t.confirmDelete(e.item.id)}}},[t._v(" "+t._s(t.$t("buttons.delete"))+" ")])]}}])})],1)],1),s("div",{staticClass:"mt-3"},[s("b-pagination",{attrs:{"total-rows":t.rows,align:"left","per-page":t.perPage,"aria-controls":"my-table"},model:{value:t.currentPage,callback:function(e){t.currentPage=e},expression:"currentPage"}})],1)],1),s("company-details",{attrs:{obj:t.obj}})],1)},a=[],c=s("205f"),i=s("a15b7"),o=s("b28b"),r=s("29a1"),l=s("1947"),u=s("26d2"),d=s("c074"),m=s("ecee"),b=s("a0a2");m["c"].add(d["a"],d["c"],d["b"]);var f={name:"AllContractsRejected",components:{BCard:c["a"],BRow:i["a"],BCol:o["a"],BTable:r["a"],BButton:l["a"],BPagination:u["a"],CompanyDetails:b["a"]},data:function(){return{perPage:6,currentPage:1,add:!0,obj:{},busy:!0,file:null,fields:[{key:"id",label:this.$t("pages.rejectedContracts.id")},{key:"created_at",label:this.$t("pages.rejectedContracts.createdAt")},{key:"is_mosque",label:this.$t("pages.rejectedContracts.isMosque")},{key:"status",label:this.$t("pages.rejectedContracts.status")},{key:"actions",label:this.$t("pages.rejectedContracts.action")}]}},computed:{rows:function(){return this.getContracts.length},getContracts:function(){return this.$store.state.contract.contracts}},created:function(){this.$store.dispatch("contract/fetch","Rejected")},methods:{confirmAccepted:function(t,e){var s=this;this.$swal({title:this.$t("pages.newContracts.confirmAccepted.title"),text:this.$t("pages.newContracts.confirmAccepted.text"),icon:"question",showCancelButton:!0,confirmButtonText:this.$t("message.accept"),cancelButtonText:this.$t("message.cancel"),customClass:{confirmButton:"btn btn-success",cancelButton:"btn btn-outline-danger ml-1"},buttonsStyling:!1}).then((function(n){if(n.value&&"A"===e){var a={contract_id:t,remove:!0,status:e};s.$store.dispatch("contract/active",a).then((function(){s.$swal({icon:"success",title:s.$t("pages.newContracts.messageAccepted.title"),text:s.$t("pages.newContracts.messageAccepted.text"),customClass:{confirmButton:"btn btn-success"}})}))}}))},confirmDelete:function(t){var e=this;this.$swal({title:this.$t("pages.rejectedContracts.confirmDelete.title"),text:this.$t("pages.rejectedContracts.confirmDelete.text"),icon:"question",showCancelButton:!0,confirmButtonText:this.$t("message.accept"),cancelButtonText:this.$t("message.cancel"),customClass:{confirmButton:"btn btn-danger",cancelButton:"btn btn-outline-primary ml-1"},buttonsStyling:!1}).then((function(s){s.value&&(e.$swal({icon:"success",title:e.$t("pages.rejectedContracts.messageDelete.title"),text:e.$t("pages.rejectedContracts.messageDelete.text"),customClass:{confirmButton:"btn btn-success"}}),e.$store.dispatch("contract/delete",t).then((function(){})))}))},showDetails:function(t){this.obj=t,this.$bvModal.show("companyDetails")}}},p=f,g=s("2877"),h=Object(g["a"])(p,n,a,!1,null,"6a5f1cc1",null);e["default"]=h.exports}}]);
//# sourceMappingURL=chunk-2d0dd49b.39e640a9.js.map