import{u as a,a as i}from"./links.CKSg78-h.js";import{o as c,c as u,a as l}from"./vue.esm-bundler.DzelZkHk.js";import{_ as f}from"./_plugin-vue_export-helper.BN1snXvA.js";const x={emits:["saving-changes","changes-saved"],methods:{processSaveChanges(){window.aioseoBus.$emit("saving-changes");const e=a();e.loading=!0;let o=!1,s=!1,t="saveChanges";setTimeout(()=>{o=!0,s&&(e.loading=!1)},1500);const n=i();this.$router.currentRoute.value.name==="htaccess-editor"&&(t="saveHtaccess",n.htaccessError=null),e.aioseo.data.isNetworkAdmin&&this.$router.currentRoute.value.name==="robots-editor"&&(t="saveNetworkRobots"),n[t]().then(r=>{r&&r.body.redirection||(o||this.$router.currentRoute.value.name==="htaccess-editor"?e.loading=!1:s=!0,window.aioseoBus.$emit("changes-saved"))})}}},_={},m={viewBox:"0 0 6 6",fill:"none",xmlns:"http://www.w3.org/2000/svg",class:"aioseo-ellipse"},p=l("circle",{r:"2",transform:"matrix(-1 0 0 1 3 3)",fill:"currentColor",stroke:"currentColor","stroke-width":"2"},null,-1),d=[p];function h(e,o){return c(),u("svg",m,d)}const y=f(_,[["render",h]]);export{y as S,x as a};
