(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-6c6df610"],{"06a5":function(e,t,a){},4918:function(e,t,a){"use strict";a.d(t,"b",(function(){return b})),a.d(t,"a",(function(){return g}));var n=a("2b0e"),s=a("b42e"),i=a("c637"),r=a("a723"),d=a("2326"),o=a("6c06"),u=a("7b1e"),c=a("3a58"),l=a("cf75"),f=a("fa73");function m(e,t,a){return t in e?Object.defineProperty(e,t,{value:a,enumerable:!0,configurable:!0,writable:!0}):e[t]=a,e}var p='<svg width="%{w}" height="%{h}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 %{w} %{h}" preserveAspectRatio="none"><rect width="100%" height="100%" style="fill:%{f};"></rect></svg>',h=function(e,t,a){var n=encodeURIComponent(p.replace("%{w}",Object(f["g"])(e)).replace("%{h}",Object(f["g"])(t)).replace("%{f}",a));return"data:image/svg+xml;charset=UTF-8,".concat(n)},b=Object(l["d"])({alt:Object(l["c"])(r["t"]),blank:Object(l["c"])(r["g"],!1),blankColor:Object(l["c"])(r["t"],"transparent"),block:Object(l["c"])(r["g"],!1),center:Object(l["c"])(r["g"],!1),fluid:Object(l["c"])(r["g"],!1),fluidGrow:Object(l["c"])(r["g"],!1),height:Object(l["c"])(r["o"]),left:Object(l["c"])(r["g"],!1),right:Object(l["c"])(r["g"],!1),rounded:Object(l["c"])(r["j"],!1),sizes:Object(l["c"])(r["f"]),src:Object(l["c"])(r["t"]),srcset:Object(l["c"])(r["f"]),thumbnail:Object(l["c"])(r["g"],!1),width:Object(l["c"])(r["o"])},i["N"]),g=n["default"].extend({name:i["N"],functional:!0,props:b,render:function(e,t){var a,n=t.props,i=t.data,r=n.alt,l=n.src,p=n.block,b=n.fluidGrow,g=n.rounded,w=Object(c["b"])(n.width)||null,v=Object(c["b"])(n.height)||null,W=null,k=Object(d["b"])(n.srcset).filter(o["a"]).join(","),$=Object(d["b"])(n.sizes).filter(o["a"]).join(",");return n.blank&&(!v&&w?v=w:!w&&v&&(w=v),w||v||(w=1,v=1),l=h(w,v,n.blankColor||"transparent"),k=null,$=null),n.left?W="float-left":n.right?W="float-right":n.center&&(W="mx-auto",p=!0),e("img",Object(s["a"])(i,{attrs:{src:l,alt:r,width:w?Object(f["g"])(w):null,height:v?Object(f["g"])(v):null,srcset:k||null,sizes:$||null},class:(a={"img-thumbnail":n.thumbnail,"img-fluid":n.fluid||b,"w-100":b,rounded:""===g||!0===g},m(a,"rounded-".concat(g),Object(u["n"])(g)&&""!==g),m(a,W,W),m(a,"d-block",p),a)}))}})},"65bf":function(e,t,a){"use strict";a.r(t);var n=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("div",[a("form-wizard",{staticClass:"mb-3",attrs:{color:"#7367F0",title:null,subtitle:null,"finish-button-text":e.$t("pages.createContract.submit"),"next-button-text":e.$t("pages.createContract.next"),"back-button-text":e.$t("pages.createContract.back"),"hide-buttons":!1},on:{"on-complete":e.formSubmitted}},[a("tab-content",{attrs:{title:e.$t("pages.createContract.contractData"),"before-change":e.validationFormDate}},[a("validation-observer",{ref:"infoDateRules",attrs:{tag:"form"}},[a("b-row",[a("b-col",{attrs:{md:"4"}},[a("b-form-group",{attrs:{label:e.$t("pages.createContract.dateOfContract"),"label-for":"quranDate"}},[a("validation-provider",{attrs:{name:"quranDate",rules:"required"},scopedSlots:e._u([{key:"default",fn:function(t){var n=t.errors;return[a("b-form-input",{attrs:{id:"quranDate",state:!(n.length>0)&&null,type:"date"},model:{value:e.quranDate,callback:function(t){e.quranDate=t},expression:"quranDate"}}),a("small",{staticClass:"text-danger"},[e._v(e._s(n[0]))])]}}])})],1)],1),a("b-col",{attrs:{md:"6"}},[a("b-form-group",{attrs:{label:e.$t("pages.createContract.placeOfContract"),"label-for":"isMosque"}},[a("validation-provider",{attrs:{name:"isMosque",rules:"required"},scopedSlots:e._u([{key:"default",fn:function(t){var n=t.errors;return[a("b-form-radio-group",{attrs:{id:"isMosque",options:e.options,name:"isMosque",state:!(n.length>0)&&null},model:{value:e.isMosque,callback:function(t){e.isMosque=t},expression:"isMosque"}}),a("small",{staticClass:"text-danger"},[e._v(e._s(n[0]))])]}}])})],1)],1),e.isMosque?e._e():a("b-col",{attrs:{md:"12"}},[a("b-form-group",{attrs:{label:e.$t("pages.createContract.contractTitle"),"label-for":"quranAddress"}},[a("validation-provider",{attrs:{name:"quranAddress",rules:"required"},scopedSlots:e._u([{key:"default",fn:function(t){var n=t.errors;return[a("b-form-textarea",{attrs:{id:"quranAddress",placeholder:"Enter address ...",rows:"3","max-rows":"6",state:!(n.length>0)&&null},model:{value:e.quranAddress,callback:function(t){e.quranAddress=t},expression:"quranAddress"}}),a("small",{staticClass:"text-danger"},[e._v(e._s(n[0]))])]}}],null,!1,2919760044)})],1)],1)],1)],1)],1),a("tab-content",{attrs:{title:e.$t("pages.createContract.husband"),"before-change":e.validationForm}},[a("validation-observer",{ref:"husbandRules",attrs:{tag:"form"}},[a("husband",{attrs:{"first-name":e.husband.firstName,"middle-name":e.husband.middleName,"last-name":e.husband.lastName,"email-address":e.husband.email,birthdate:e.husband.birthdate,birthplace:e.husband.birthplace,marital:e.husband.maritalStatus,"marital-option":e.maritalOptionHusband,nationality:e.husband.nationality,profession:e.husband.profession,address:e.husband.address,phone:e.husband.phone,type:e.husband.type},on:{"update:firstName":function(t){return e.$set(e.husband,"firstName",t)},"update:first-name":function(t){return e.$set(e.husband,"firstName",t)},"update:middleName":function(t){return e.$set(e.husband,"middleName",t)},"update:middle-name":function(t){return e.$set(e.husband,"middleName",t)},"update:lastName":function(t){return e.$set(e.husband,"lastName",t)},"update:last-name":function(t){return e.$set(e.husband,"lastName",t)},"update:emailAddress":function(t){return e.$set(e.husband,"email",t)},"update:email-address":function(t){return e.$set(e.husband,"email",t)},"update:birthdate":function(t){return e.$set(e.husband,"birthdate",t)},"update:birthplace":function(t){return e.$set(e.husband,"birthplace",t)},"update:marital":function(t){return e.$set(e.husband,"maritalStatus",t)},"update:nationality":function(t){return e.$set(e.husband,"nationality",t)},"update:profession":function(t){return e.$set(e.husband,"profession",t)},"update:address":function(t){return e.$set(e.husband,"address",t)},"update:phone":function(t){return e.$set(e.husband,"phone",t)},"update:type":function(t){return e.$set(e.husband,"type",t)}}})],1)],1),a("tab-content",{attrs:{title:e.$t("pages.createContract.wife"),"before-change":e.validationFormWife}},[a("validation-observer",{ref:"wifeRules",attrs:{tag:"form"}},[a("wife",{attrs:{"first-name":e.wife.firstName,"middle-name":e.wife.middleName,"last-name":e.wife.lastName,"email-address":e.wife.email,birthdate:e.wife.birthdate,birthplace:e.wife.birthplace,marital:e.wife.maritalStatus,"marital-option":e.maritalOptionWife,nationality:e.wife.nationality,profession:e.wife.profession,address:e.wife.address,phone:e.wife.phone,type:e.wife.type},on:{"update:firstName":function(t){return e.$set(e.wife,"firstName",t)},"update:first-name":function(t){return e.$set(e.wife,"firstName",t)},"update:middleName":function(t){return e.$set(e.wife,"middleName",t)},"update:middle-name":function(t){return e.$set(e.wife,"middleName",t)},"update:lastName":function(t){return e.$set(e.wife,"lastName",t)},"update:last-name":function(t){return e.$set(e.wife,"lastName",t)},"update:emailAddress":function(t){return e.$set(e.wife,"email",t)},"update:email-address":function(t){return e.$set(e.wife,"email",t)},"update:birthdate":function(t){return e.$set(e.wife,"birthdate",t)},"update:birthplace":function(t){return e.$set(e.wife,"birthplace",t)},"update:marital":function(t){return e.$set(e.wife,"maritalStatus",t)},"update:nationality":function(t){return e.$set(e.wife,"nationality",t)},"update:profession":function(t){return e.$set(e.wife,"profession",t)},"update:address":function(t){return e.$set(e.wife,"address",t)},"update:phone":function(t){return e.$set(e.wife,"phone",t)},"update:type":function(t){return e.$set(e.wife,"type",t)}}})],1)],1),a("tab-content",{attrs:{title:e.$t("pages.createContract.firstWitness"),"before-change":e.validationFormFirstWitness}},[a("validation-observer",{ref:"firstWitnessRules",attrs:{tag:"form"}},[a("wife",{attrs:{"first-name":e.firstWitness.firstName,"middle-name":e.firstWitness.middleName,"last-name":e.firstWitness.lastName,"email-address":e.firstWitness.email,birthdate:e.firstWitness.birthdate,birthplace:e.firstWitness.birthplace,"marital-status":e.firstWitness.maritalStatus,nationality:e.firstWitness.nationality,profession:e.firstWitness.profession,address:e.firstWitness.address,phone:e.firstWitness.phone,type:e.firstWitness.type},on:{"update:firstName":function(t){return e.$set(e.firstWitness,"firstName",t)},"update:first-name":function(t){return e.$set(e.firstWitness,"firstName",t)},"update:middleName":function(t){return e.$set(e.firstWitness,"middleName",t)},"update:middle-name":function(t){return e.$set(e.firstWitness,"middleName",t)},"update:lastName":function(t){return e.$set(e.firstWitness,"lastName",t)},"update:last-name":function(t){return e.$set(e.firstWitness,"lastName",t)},"update:emailAddress":function(t){return e.$set(e.firstWitness,"email",t)},"update:email-address":function(t){return e.$set(e.firstWitness,"email",t)},"update:birthdate":function(t){return e.$set(e.firstWitness,"birthdate",t)},"update:birthplace":function(t){return e.$set(e.firstWitness,"birthplace",t)},"update:maritalStatus":function(t){return e.$set(e.firstWitness,"maritalStatus",t)},"update:marital-status":function(t){return e.$set(e.firstWitness,"maritalStatus",t)},"update:nationality":function(t){return e.$set(e.firstWitness,"nationality",t)},"update:profession":function(t){return e.$set(e.firstWitness,"profession",t)},"update:address":function(t){return e.$set(e.firstWitness,"address",t)},"update:phone":function(t){return e.$set(e.firstWitness,"phone",t)},"update:type":function(t){return e.$set(e.firstWitness,"type",t)}}})],1)],1),a("tab-content",{attrs:{title:e.$t("pages.createContract.secondWitness"),"before-change":e.validationFormSecondWitness}},[a("validation-observer",{ref:"secondWitnessRules",attrs:{tag:"form"}},[a("wife",{attrs:{"first-name":e.secondWitness.firstName,"middle-name":e.secondWitness.middleName,"last-name":e.secondWitness.lastName,"email-address":e.secondWitness.email,birthdate:e.secondWitness.birthdate,birthplace:e.secondWitness.birthplace,"marital-status":e.secondWitness.maritalStatus,nationality:e.secondWitness.nationality,profession:e.secondWitness.profession,address:e.secondWitness.address,phone:e.secondWitness.phone,type:e.secondWitness.type},on:{"update:firstName":function(t){return e.$set(e.secondWitness,"firstName",t)},"update:first-name":function(t){return e.$set(e.secondWitness,"firstName",t)},"update:middleName":function(t){return e.$set(e.secondWitness,"middleName",t)},"update:middle-name":function(t){return e.$set(e.secondWitness,"middleName",t)},"update:lastName":function(t){return e.$set(e.secondWitness,"lastName",t)},"update:last-name":function(t){return e.$set(e.secondWitness,"lastName",t)},"update:emailAddress":function(t){return e.$set(e.secondWitness,"email",t)},"update:email-address":function(t){return e.$set(e.secondWitness,"email",t)},"update:birthdate":function(t){return e.$set(e.secondWitness,"birthdate",t)},"update:birthplace":function(t){return e.$set(e.secondWitness,"birthplace",t)},"update:maritalStatus":function(t){return e.$set(e.secondWitness,"maritalStatus",t)},"update:marital-status":function(t){return e.$set(e.secondWitness,"maritalStatus",t)},"update:nationality":function(t){return e.$set(e.secondWitness,"nationality",t)},"update:profession":function(t){return e.$set(e.secondWitness,"profession",t)},"update:address":function(t){return e.$set(e.secondWitness,"address",t)},"update:phone":function(t){return e.$set(e.secondWitness,"phone",t)},"update:type":function(t){return e.$set(e.secondWitness,"type",t)}}})],1)],1),a("tab-content",{attrs:{title:e.$t("pages.createContract.agent"),"before-change":e.validationFormAgent}},[a("validation-observer",{ref:"agentRules",attrs:{tag:"form"}},[a("agent",{attrs:{"first-name":e.agent.firstName,"middle-name":e.agent.middleName,"last-name":e.agent.lastName,"email-address":e.agent.email,birthdate:e.agent.birthdate,birthplace:e.agent.birthplace,marital:e.agent.maritalStatus,nationality:e.agent.nationality,profession:e.agent.profession,address:e.agent.address,phone:e.agent.phone,type:e.agent.type,"kinship-degree":e.agent.kinshipDegree,"kinship-degree-option":e.agent.kinshipDegreeOption},on:{"update:firstName":function(t){return e.$set(e.agent,"firstName",t)},"update:first-name":function(t){return e.$set(e.agent,"firstName",t)},"update:middleName":function(t){return e.$set(e.agent,"middleName",t)},"update:middle-name":function(t){return e.$set(e.agent,"middleName",t)},"update:lastName":function(t){return e.$set(e.agent,"lastName",t)},"update:last-name":function(t){return e.$set(e.agent,"lastName",t)},"update:emailAddress":function(t){return e.$set(e.agent,"email",t)},"update:email-address":function(t){return e.$set(e.agent,"email",t)},"update:birthdate":function(t){return e.$set(e.agent,"birthdate",t)},"update:birthplace":function(t){return e.$set(e.agent,"birthplace",t)},"update:marital":function(t){return e.$set(e.agent,"maritalStatus",t)},"update:nationality":function(t){return e.$set(e.agent,"nationality",t)},"update:profession":function(t){return e.$set(e.agent,"profession",t)},"update:address":function(t){return e.$set(e.agent,"address",t)},"update:phone":function(t){return e.$set(e.agent,"phone",t)},"update:type":function(t){return e.$set(e.agent,"type",t)},"update:kinshipDegree":function(t){return e.$set(e.agent,"kinshipDegree",t)},"update:kinship-degree":function(t){return e.$set(e.agent,"kinshipDegree",t)},"update:kinshipDegreeOption":function(t){return e.$set(e.agent,"kinshipDegreeOption",t)},"update:kinship-degree-option":function(t){return e.$set(e.agent,"kinshipDegreeOption",t)}}})],1)],1),a("tab-content",{attrs:{title:e.$t("pages.createContract.attachments")}},[a("validation-observer",{ref:"attachmentsRules",attrs:{tag:"form"}},[a("edit-attachments",{attrs:{"husband-front":e.husbandFront,"husband-back":e.husbandBack,"wife-front":e.wifeFront,"wife-back":e.wifeBack,"first-witness-front":e.firstWitnessFront,"first-witness-back":e.firstWitnessBack,"second-witness-front":e.secondWitnessFront,"second-witness-back":e.secondWitnessBack,"agent-front":e.agentFront,"agent-back":e.agentBack,"divorce-certificate":e.divorceCertificate,"husband-death-certificate":e.husbandDeathCertificate,status:e.statusFile(e.wife.maritalStatus),"husband-front-image":e.husbandFrontImage,"husband-back-image":e.husbandBackImage,"wife-front-image":e.wifeFrontImage,"wife-back-image":e.wifeBackImage,"first-witness-front-image":e.firstWitnessFrontImage,"first-witness-back-image":e.firstWitnessBackImage,"second-witness-front-image":e.secondWitnessFrontImage,"second-witness-back-image":e.secondWitnessBackImage,"agent-front-image":e.agentFrontImage,"agent-back-image":e.agentBackImage,"divorce-certificate-image":e.divorceCertificateImage,"husband-death-certificate-image":e.husbandDeathCertificateImage},on:{"update:husbandFront":function(t){e.husbandFront=t},"update:husband-front":function(t){e.husbandFront=t},"update:husbandBack":function(t){e.husbandBack=t},"update:husband-back":function(t){e.husbandBack=t},"update:wifeFront":function(t){e.wifeFront=t},"update:wife-front":function(t){e.wifeFront=t},"update:wifeBack":function(t){e.wifeBack=t},"update:wife-back":function(t){e.wifeBack=t},"update:firstWitnessFront":function(t){e.firstWitnessFront=t},"update:first-witness-front":function(t){e.firstWitnessFront=t},"update:firstWitnessBack":function(t){e.firstWitnessBack=t},"update:first-witness-back":function(t){e.firstWitnessBack=t},"update:secondWitnessFront":function(t){e.secondWitnessFront=t},"update:second-witness-front":function(t){e.secondWitnessFront=t},"update:secondWitnessBack":function(t){e.secondWitnessBack=t},"update:second-witness-back":function(t){e.secondWitnessBack=t},"update:agentFront":function(t){e.agentFront=t},"update:agent-front":function(t){e.agentFront=t},"update:agentBack":function(t){e.agentBack=t},"update:agent-back":function(t){e.agentBack=t},"update:divorceCertificate":function(t){e.divorceCertificate=t},"update:divorce-certificate":function(t){e.divorceCertificate=t},"update:husbandDeathCertificate":function(t){e.husbandDeathCertificate=t},"update:husband-death-certificate":function(t){e.husbandDeathCertificate=t}}})],1)],1)],1)],1)},s=[],i=(a("159b"),a("1276"),a("ac1f"),a("d3b7"),a("2ee4")),r=a("7bb1"),d=a("223c"),o=(a("da93"),a("d5a3"),a("8f03")),u=a("d1bc"),c=a("ac69"),l=a("3240"),f=function(){var e=this,t=e.$createElement,a=e._self._c||t;return a("b-row",[a("b-col",{staticClass:"mb-2",attrs:{cols:"12"}},[a("h5",{staticClass:"mb-0"},[e._v(" "+e._s(e.$t("attachments.title"))+" ")]),a("small",{staticClass:"text-muted"},[e._v(" "+e._s(e.$t("attachments.description"))+" ")])]),a("b-col",{attrs:{md:"4"}},[e.husbandFront?e._e():a("b-img",{staticClass:"mb-1",attrs:{src:e.husbandFrontImage,alt:e.husbandFrontImage,rounded:"",width:"300px"}}),a("file-pond",{ref:"husbandFront",attrs:{required:"true",name:"data","label-idle":e.$t("attachments.husbandFront"),"allow-multiple":!1,"accepted-file-types":"image/jpeg, image/png",server:e.server},on:{processfile:e.husbandFrontEvent,removefile:function(t){return e.$emit("update:husbandFront",null)}}})],1),a("b-col",{attrs:{md:"4"}},[e.husbandBack?e._e():a("b-img",{staticClass:"mb-1",attrs:{src:e.husbandBackImage,alt:e.husbandBackImage,rounded:"",width:"300px"}}),a("file-pond",{ref:"husbandBack",attrs:{required:"true",name:"data","label-idle":e.$t("attachments.husbandBack"),"allow-multiple":!1,"accepted-file-types":"image/jpeg, image/png",server:e.server},on:{processfile:e.husbandBackEvent,removefile:function(t){return e.$emit("update:husbandBack",null)}}})],1),a("b-col",{attrs:{md:"4"}},[e.wifeFront?e._e():a("b-img",{staticClass:"mb-1",attrs:{src:e.wifeFrontImage,alt:e.wifeFrontImage,rounded:"",width:"300px"}}),a("file-pond",{ref:"wifeFront",attrs:{required:"true",name:"data","label-idle":e.$t("attachments.wifeFront"),"allow-multiple":!1,"accepted-file-types":"image/jpeg, image/png",server:e.server},on:{processfile:e.wifeFrontEvent,removefile:function(t){return e.$emit("update:wifeFront",null)}}})],1),a("b-col",{attrs:{md:"4"}},[e.wifeBack?e._e():a("b-img",{staticClass:"mb-1",attrs:{src:e.wifeBackImage,alt:e.wifeBackImage,rounded:"",width:"300px"}}),a("file-pond",{ref:"wifeBack",attrs:{required:"true",name:"data","label-idle":e.$t("attachments.wifeBack"),"allow-multiple":!1,"accepted-file-types":"image/jpeg, image/png",server:e.server},on:{processfile:e.wifeBackEvent,removefile:function(t){return e.$emit("update:wifeBack",null)}}})],1),a("b-col",{attrs:{md:"4"}},[e.wifeBack?e._e():a("b-img",{staticClass:"mb-1",attrs:{src:e.wifeBackImage,alt:e.wifeBackImage,rounded:"",width:"300px"}}),a("file-pond",{ref:"firstWitnessFront",attrs:{required:"true",name:"data","label-idle":e.$t("attachments.firstWitnessFront"),"allow-multiple":!1,"accepted-file-types":"image/jpeg, image/png",server:e.server},on:{processfile:e.firstWitnessFrontEvent,removefile:function(t){return e.$emit("update:firstWitnessFront",null)}}})],1),a("b-col",{attrs:{md:"4"}},[e.firstWitnessBack?e._e():a("b-img",{staticClass:"mb-1",attrs:{src:e.firstWitnessBackImage,alt:e.firstWitnessBackImage,rounded:"",width:"300px"}}),a("file-pond",{ref:"firstWitnessBack",attrs:{required:"true",name:"data","label-idle":e.$t("attachments.firstWitnessBack"),"allow-multiple":!1,"accepted-file-types":"image/jpeg, image/png",server:e.server},on:{processfile:e.firstWitnessBackEvent,removefile:function(t){return e.$emit("update:firstWitnessBack",null)}}})],1),a("b-col",{attrs:{md:"4"}},[e.secondWitnessFront?e._e():a("b-img",{staticClass:"mb-1",attrs:{src:e.secondWitnessFrontImage,alt:e.secondWitnessFrontImage,rounded:"",width:"300px"}}),a("file-pond",{ref:"secondWitnessFront",attrs:{required:"true",name:"data","label-idle":e.$t("attachments.secondWitnessFront"),"allow-multiple":!1,"accepted-file-types":"image/jpeg, image/png",server:e.server},on:{processfile:e.secondWitnessFrontEvent,removefile:function(t){return e.$emit("update:secondWitnessFront",null)}}})],1),a("b-col",{attrs:{md:"4"}},[e.secondWitnessBack?e._e():a("b-img",{staticClass:"mb-1",attrs:{src:e.secondWitnessBackImage,alt:e.secondWitnessBackImage,rounded:"",width:"300px"}}),a("file-pond",{ref:"secondWitnessBack",attrs:{required:"true",name:"data","label-idle":e.$t("attachments.secondWitnessBack"),"allow-multiple":!1,"accepted-file-types":"image/jpeg, image/png",server:e.server},on:{processfile:e.secondWitnessBackEvent,removefile:function(t){return e.$emit("update:secondWitnessBack",null)}}})],1),a("b-col",{attrs:{md:"4"}},[e.agentFront?e._e():a("b-img",{staticClass:"mb-1",attrs:{src:e.agentFrontImage,alt:e.agentFrontImage,rounded:"",width:"300px"}}),a("file-pond",{ref:"agentFront",attrs:{required:"true",name:"data","label-idle":e.$t("attachments.agentFront"),"allow-multiple":!1,"accepted-file-types":"image/jpeg, image/png",server:e.server},on:{processfile:e.agentFrontEvent,removefile:function(t){return e.$emit("update:agentFront",null)}}})],1),a("b-col",{attrs:{md:"4"}},[e.agentBack?e._e():a("b-img",{staticClass:"mb-1",attrs:{src:e.agentBackImage,alt:e.agentBackImage,rounded:"",width:"300px"}}),a("file-pond",{ref:"agentBack",attrs:{required:"true",name:"data","label-idle":e.$t("attachments.agentBack"),"allow-multiple":!1,"accepted-file-types":"image/jpeg, image/png",server:e.server},on:{processfile:e.agentBackEvent,removefile:function(t){return e.$emit("update:agentBack",null)}}})],1),"d"===e.status?a("b-col",{attrs:{md:"4"}},[e.divorceCertificate?e._e():a("b-img",{staticClass:"mb-1",attrs:{src:e.divorceCertificateImage,alt:e.divorceCertificateImage,rounded:"",width:"300px"}}),a("file-pond",{ref:"divorceCertificate",attrs:{required:"true",name:"data","label-idle":e.$t("attachments.divorceCertificate"),"allow-multiple":!1,"accepted-file-types":"image/jpeg, image/png",server:e.server},on:{processfile:e.divorceCertificateEvent,removefile:function(t){return e.$emit("update:divorceCertificate",null)}}})],1):e._e(),"w"===e.status?a("b-col",{attrs:{md:"4"}},[e.husbandDeathCertificate?e._e():a("b-img",{staticClass:"mb-1",attrs:{src:e.husbandDeathCertificateImage,alt:e.husbandDeathCertificateImage,rounded:"",width:"300px"}}),a("file-pond",{ref:"husbandDeathCertificate",attrs:{required:"true",name:"data","label-idle":e.$t("attachments.husbandDeathCertificate"),"allow-multiple":!1,"accepted-file-types":"image/jpeg, image/png",server:e.server},on:{processfile:e.husbandDeathCertificateEvent,removefile:function(t){return e.$emit("update:husbandDeathCertificate",null)}}})],1):e._e()],1)},m=[],p=a("1501"),h=a.n(p),b=(a("4ed3"),a("57c8"),a("1942")),g=a.n(b),w=a("2cfc"),v=a.n(w),W=a("a15b7"),k=a("b28b"),$=a("4918"),F=a("7f80"),y=h()(g.a,v.a),B={ar:{names:{email:"البريد الاليكتروني",phone:"رقم الهاتف",Password:"كلمة السر",website:"الموقع الالكتروني",country:"المحافظة",landline_number:"الرقم المباشر",direct_employee_name:"اسم الموظف المباشر",direct_employee_phone:"رقم هاتف الموظف المباشر",factory_register:"سجل المصنع",factory_register_image:"صورة سجل المصنع",letter_image:"صورة الخطاب",address:"العنوان"}}};Object(r["d"])("ar",B.ar);var _={name:"Attachments",components:{FilePond:y,BRow:W["a"],BCol:k["a"],BImg:$["a"],ToastificationContent:d["a"]},props:{label:{type:String,default:null},husbandFront:{type:String,default:null},husbandBack:{type:String,default:null},wifeFront:{type:String,default:null},wifeBack:{type:String,default:null},firstWitnessFront:{type:String,default:null},firstWitnessBack:{type:String,default:null},secondWitnessFront:{type:String,default:null},secondWitnessBack:{type:String,default:null},agentFront:{type:String,default:null},agentBack:{type:String,default:null},divorceCertificate:{type:String,default:null},husbandDeathCertificate:{type:String,default:null},husbandFrontImage:{type:String,default:null},husbandBackImage:{type:String,default:null},wifeFrontImage:{type:String,default:null},wifeBackImage:{type:String,default:null},firstWitnessFrontImage:{type:String,default:null},firstWitnessBackImage:{type:String,default:null},secondWitnessFrontImage:{type:String,default:null},secondWitnessBackImage:{type:String,default:null},agentFrontImage:{type:String,default:null},agentBackImage:{type:String,default:null},divorceCertificateImage:{type:String,default:null},husbandDeathCertificateImage:{type:String,default:null},type:{type:String,required:!1,default:""},status:{type:String,required:!0,default:"s"}},data:function(){return{myFiles:["https://uploads-ssl.webflow.com/5b0886c4be77e07a3437bd81/5b0f2ce0558807aeea5e4b9e_badbunny1.jpg"],server:"".concat(F["b"],"upload"),locale:"ar",required:o["b"],email:o["a"]}},watch:{husbandFront:function(){console.log(this.husbandFront)}},created:function(){},methods:{husbandFrontEvent:function(e,t){var a=JSON.parse(t.serverId);this.$emit("update:husbandFront",a.data)},husbandBackEvent:function(e,t){var a=JSON.parse(t.serverId);this.$emit("update:husbandBack",a.data)},wifeFrontEvent:function(e,t){var a=JSON.parse(t.serverId);this.$emit("update:wifeFront",a.data)},wifeBackEvent:function(e,t){var a=JSON.parse(t.serverId);this.$emit("update:wifeBack",a.data)},firstWitnessFrontEvent:function(e,t){var a=JSON.parse(t.serverId);this.$emit("update:firstWitnessFront",a.data)},firstWitnessBackEvent:function(e,t){var a=JSON.parse(t.serverId);this.$emit("update:firstWitnessBack",a.data)},secondWitnessFrontEvent:function(e,t){var a=JSON.parse(t.serverId);this.$emit("update:secondWitnessFront",a.data)},secondWitnessBackEvent:function(e,t){var a=JSON.parse(t.serverId);this.$emit("update:secondWitnessBack",a.data)},agentFrontEvent:function(e,t){var a=JSON.parse(t.serverId);this.$emit("update:agentFront",a.data)},agentBackEvent:function(e,t){var a=JSON.parse(t.serverId);this.$emit("update:agentBack",a.data)},divorceCertificateEvent:function(e,t){var a=JSON.parse(t.serverId);this.$emit("update:divorceCertificate",a.data)},husbandDeathCertificateEvent:function(e,t){var a=JSON.parse(t.serverId);this.$emit("update:husbandDeathCertificate",a.data)}}},N=_,I=(a("acdc"),a("2877")),C=Object(I["a"])(N,f,m,!1,null,null,null),S=C.exports,D=a("8226"),O=a("4797"),q=a("2924"),j=a("9c7d"),x={ar:{names:{email:"البريد الاليكتروني",phone:"رقم الهاتف",Password:"كلمة السر","Password Confirm":"تاكيد كلمة المرور",website:"الموقع الالكتروني",country:"المحافظة",landline_number:"الرقم المباشر",direct_employee_name:"اسم الموظف المباشر",direct_employee_phone:"رقم هاتف الموظف المباشر",factory_register:"سجل المصنع",factory_register_image:"صورة سجل المصنع",letter_image:"صورة الخطاب",address:"العنوان"}}};Object(r["d"])("ar",x.ar);var E={name:"EditContract",components:{ValidationObserver:r["a"],ValidationProvider:r["b"],FormWizard:i["FormWizard"],Husband:u["a"],TabContent:i["TabContent"],BRow:W["a"],BCol:k["a"],BFormGroup:D["a"],BFormInput:O["a"],BFormRadioGroup:q["a"],BFormTextarea:j["a"],ToastificationContent:d["a"],EditAttachments:S,Wife:c["a"],Agent:l["a"]},data:function(){return{husbandFront:null,husbandBack:null,wifeFront:null,wifeBack:null,firstWitnessFront:null,firstWitnessBack:null,secondWitnessFront:null,secondWitnessBack:null,agentFront:null,agentBack:null,divorceCertificate:null,husbandDeathCertificate:null,husbandFrontImage:null,husbandBackImage:null,wifeFrontImage:null,wifeBackImage:null,firstWitnessFrontImage:null,firstWitnessBackImage:null,secondWitnessFrontImage:null,secondWitnessBackImage:null,agentFrontImage:null,agentBackImage:null,divorceCertificateImage:null,husbandDeathCertificateImage:null,quranDate:null,isMosque:1,quranAddress:null,selected:"first",options:[{text:"في المسجد",value:1},{text:"خارج المسجد",value:0}],array:[],maritalOptionHusband:[{id:"single",name:"اعزب"},{id:"divorced",name:"مطلق"},{id:"married",name:"متزوج"},{id:"widower",name:"ارمل"}],maritalOptionWife:[{id:"single",name:"اعزب"},{id:"divorced",name:"مطلق"},{id:"widower",name:"ارمل"}],husband:{firstName:"",middleName:"",lastName:"",email:"",birthdate:"2020-01-01",birthplace:"",maritalStatus:"single",nationality:"",profession:"",address:"",phone:"",type:"husband"},wife:{firstName:"",middleName:"",lastName:"",email:"",birthdate:"22-22-2035",birthplace:"",maritalStatus:"single",nationality:"",profession:"",address:"",phone:"",type:"wife"},firstWitness:{firstName:"",middleName:"",lastName:"",email:"",birthdate:"22-22-2035",birthplace:"",maritalStatus:"single",nationality:"",profession:"",address:"",phone:"",type:"first_witness"},secondWitness:{firstName:"",middleName:"",lastName:"",email:"",birthdate:"22-22-2035",birthplace:"",maritalStatus:"single",nationality:"",profession:"",address:"",phone:"",type:"second_witness"},agent:{firstName:"",middleName:"",lastName:"",email:"",birthdate:"22-22-2035",birthplace:"",maritalStatus:"single",nationality:"",profession:"",address:"",phone:"",type:"agent",kinshipDegree:"father",kinshipDegreeOption:[{id:"father",name:"اب"},{id:"brother",name:"اخ"},{id:"uncle",name:"عم"},{id:"grand_father",name:"جد"}]},required:o["b"],locale:"ar"}},created:function(){var e=this;this.$store.dispatch("contract/show",this.$route.params.id).then((function(t){e.fetchData(t.data.data)}))},methods:{statusFile:function(e){var t=null;switch(e){case"single":t="s";break;case"divorced":t="d";break;case"widower":t="w";break;default:t="s"}return t},prepareData:function(){this.array=[],this.array.push(this.husband),this.array.push(this.wife),this.array.push(this.firstWitness),this.array.push(this.secondWitness),this.array.push(this.agent)},formSubmitted:function(){var e=this;this.prepareData();var t=new FormData;t.append("husbandFront",this.husbandFront),t.append("husbandBack",this.husbandBack),t.append("wifeFront",this.wifeFront),t.append("wifeBack",this.wifeBack),t.append("firstWitnessFront",this.firstWitnessFront),t.append("firstWitnessBack",this.firstWitnessBack),t.append("secondWitnessFront",this.secondWitnessFront),t.append("secondWitnessBack",this.secondWitnessBack),t.append("agentFront",this.agentFront),t.append("agentBack",this.agentBack),t.append("divorceCertificate",this.divorceCertificate),t.append("husbandDeathCertificate",this.husbandDeathCertificate),t.append("contractId",this.dataId),t.append("quran_date",this.quranDate),t.append("is_mosque",this.isMosque),t.append("quran_address",this.quranAddress),this.array.forEach((function(e,a){t.append("data[".concat(a,"][first_name]"),e.firstName),t.append("data[".concat(a,"][middle_name]"),e.middleName),t.append("data[".concat(a,"][last_name]"),e.lastName),t.append("data[".concat(a,"][email]"),e.email),t.append("data[".concat(a,"][birth_date]"),e.birthdate),t.append("data[".concat(a,"][birth_place]"),e.birthplace),t.append("data[".concat(a,"][marital_status]"),e.maritalStatus),t.append("data[".concat(a,"][nationality]"),e.nationality),t.append("data[".concat(a,"][profession]"),e.profession),t.append("data[".concat(a,"][address]"),e.address),t.append("data[".concat(a,"][phone_number]"),e.phone),t.append("data[".concat(a,"][type]"),e.type),t.append("data[".concat(a,"][kinship_degree]"),e.kinshipDegree)})),this.$store.dispatch("contract/update",t).then((function(){e.$toast({component:d["a"],props:{title:"تم اضافة العقد بنجاح",icon:"EditIcon",variant:"success"}})}))},formatDate:function(e){var t=e.split(" ");return t[0]},fetchData:function(e){var t=this;e&&(this.dataId=e.id,this.isMosque=e.is_mosque,this.dataDiscount=e.created_at,this.quranAddress=e.quran_address,this.quranDate=this.formatDate(e.quran_date),this.husbandFrontImage=e.husbandFront,this.husbandBackImage=e.husbandBack,this.wifeFrontImage=e.wifeFront,this.wifeBackImage=e.wifeBack,this.firstWitnessFrontImage=e.firstWitnessFront,this.firstWitnessBackImage=e.firstWitnessBack,this.secondWitnessFrontImage=e.secondWitnessFront,this.secondWitnessBackImage=e.secondWitnessBack,this.agentFrontImage=e.agentFront,this.agentBackImage=e.agentBack,this.divorceCertificateImage=e.divorceCertificate,this.husbandDeathCertificateImage=e.husbandDeathCertificate,this.dataCode=e.user_id,e.person.forEach((function(e){"husband"===e.type&&(t.husband.firstName=e.first_name,t.husband.middleName=e.middle_name,t.husband.lastName=e.last_name,t.husband.email=e.email,t.husband.birthdate=e.birth_date,t.husband.birthplace=e.birth_place,t.husband.maritalStatus=e.marital_status,t.husband.nationality=e.nationality,t.husband.profession=e.first_name,t.husband.address=e.address,t.husband.phone=e.phone_number),"wife"===e.type&&(t.wife.firstName=e.first_name,t.wife.middleName=e.middle_name,t.wife.lastName=e.last_name,t.wife.email=e.email,t.wife.birthdate=e.birth_date,t.wife.birthplace=e.birth_place,t.wife.maritalStatus=e.marital_status,t.wife.nationality=e.nationality,t.wife.profession=e.first_name,t.wife.address=e.address,t.wife.phone=e.phone_number),"first_witness"===e.type&&(t.firstWitness.firstName=e.first_name,t.firstWitness.middleName=e.middle_name,t.firstWitness.lastName=e.last_name,t.firstWitness.email=e.email,t.firstWitness.birthdate=e.birth_date,t.firstWitness.birthplace=e.birth_place,t.firstWitness.maritalStatus=e.marital_status,t.firstWitness.nationality=e.nationality,t.firstWitness.profession=e.first_name,t.firstWitness.address=e.address,t.firstWitness.phone=e.phone_number),"second_witness"===e.type&&(t.secondWitness.firstName=e.first_name,t.secondWitness.middleName=e.middle_name,t.secondWitness.lastName=e.last_name,t.secondWitness.email=e.email,t.secondWitness.birthdate=e.birth_date,t.secondWitness.birthplace=e.birth_place,t.secondWitness.maritalStatus=e.marital_status,t.secondWitness.nationality=e.nationality,t.secondWitness.profession=e.first_name,t.secondWitness.address=e.address,t.secondWitness.phone=e.phone_number),"agent"===e.type&&(t.agent.firstName=e.first_name,t.agent.middleName=e.middle_name,t.agent.lastName=e.last_name,t.agent.email=e.email,t.agent.birthdate=e.birth_date,t.agent.birthplace=e.birth_place,t.agent.maritalStatus=e.marital_status,t.agent.nationality=e.nationality,t.agent.profession=e.first_name,t.agent.address=e.address,t.agent.phone=e.phone_number,t.agent.kinshipDegree=e.kinship_degree)})))},validationFormDate:function(){var e=this;return new Promise((function(t,a){e.$refs.infoDateRules.validate().then((function(e){e?t(!0):a()}))}))},validationForm:function(){var e=this;return new Promise((function(t,a){e.$refs.husbandRules.validate().then((function(e){e?t(!0):a()}))}))},validationFormWife:function(){var e=this;return new Promise((function(t,a){e.$refs.wifeRules.validate().then((function(e){e?t(!0):a()}))}))},validationFormFirstWitness:function(){var e=this;return new Promise((function(t,a){e.$refs.firstWitnessRules.validate().then((function(e){e?t(!0):a()}))}))},validationFormSecondWitness:function(){var e=this;return new Promise((function(t,a){e.$refs.secondWitnessRules.validate().then((function(e){e?t(!0):a()}))}))},validationFormAgent:function(){var e=this;return new Promise((function(t,a){e.$refs.agentRules.validate().then((function(e){e?t(!0):a()}))}))}}},A=E,R=Object(I["a"])(A,n,s,!1,null,"4144093b",null);t["default"]=R.exports},acdc:function(e,t,a){"use strict";a("06a5")}}]);
//# sourceMappingURL=chunk-6c6df610.5f9c431a.js.map