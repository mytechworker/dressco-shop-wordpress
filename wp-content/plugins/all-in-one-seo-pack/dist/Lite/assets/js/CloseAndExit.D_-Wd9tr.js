import{a as S,u as k,g as y}from"./links.CKSg78-h.js";import"./default-i18n.BtxsUzQk.js";import{y as l,o as d,c,q as v,t,H as u,D as r,m as n,E as p,a}from"./vue.esm-bundler.DzelZkHk.js";import{_ as z}from"./_plugin-vue_export-helper.BN1snXvA.js";import{S as C}from"./Caret.Cuasz9Up.js";import{u as W}from"./Wizard.Cs56tV0n.js";import{C as b}from"./Index.6gbvf_mk.js";const w={setup(){const{strings:e}=W();return{optionsStore:S(),rootStore:k(),setupWizardStore:y(),strings:e}},components:{CoreModal:b,SvgClose:C},data(){return{loading:!1}},methods:{processOptIn(){this.setupWizardStore.smartRecommendations.usageTracking=!0,this.loading=!0,this.setupWizardStore.saveWizard("smartRecommendations").then(()=>{window.location.href=this.rootStore.aioseo.urls.aio.dashboard})}}},T={class:"aioseo-wizard-close-and-exit"},x=["href"],M={class:"aioseo-modal-body"},A=["innerHTML"],U={class:"actions"};function E(e,s,B,o,g,_){const f=l("svg-close"),m=l("base-button"),h=l("core-modal");return d(),c("div",T,[v(e.$slots,"links",{},()=>[e.$isPro||o.optionsStore.options.advanced.usageTracking?(d(),c("a",{key:0,href:o.rootStore.aioseo.urls.aio.dashboard},t(o.strings.closeAndExit),9,x)):(d(),c("a",{key:1,href:"#",onClick:s[0]||(s[0]=u(i=>o.setupWizardStore.showUsageTrackingModal=!0,["prevent"]))},t(o.strings.closeAndExit),1))]),r(h,{show:o.setupWizardStore.showUsageTrackingModal&&!e.$isPro,onClose:s[3]||(s[3]=i=>o.setupWizardStore.showUsageTrackingModal=!1),classes:["aioseo-close-and-exit-modal"]},{header:n(()=>[p(t(o.strings.buildABetterAioseo)+" ",1),a("button",{class:"close",onClick:s[2]||(s[2]=u(i=>o.setupWizardStore.showUsageTrackingModal=!1,["stop"]))},[r(f,{onClick:s[1]||(s[1]=i=>o.setupWizardStore.showUsageTrackingModal=!1)})])]),body:n(()=>[a("div",M,[a("div",{class:"reset-description",innerHTML:o.strings.getImprovedFeatures},null,8,A),a("div",U,[r(m,{tag:"a",href:o.rootStore.aioseo.urls.aio.dashboard,type:"gray",size:"medium"},{default:n(()=>[p(t(o.strings.noThanks),1)]),_:1},8,["href"]),r(m,{type:"blue",size:"medium",loading:g.loading,onClick:u(_.processOptIn,["stop"])},{default:n(()=>[p(t(o.strings.yesCountMeIn),1)]),_:1},8,["loading","onClick"])])])]),_:1},8,["show"])])}const V=z(w,[["render",E]]);export{V as W};
