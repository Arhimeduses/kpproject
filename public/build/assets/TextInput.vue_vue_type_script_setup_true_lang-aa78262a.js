import{d as u,j as i,q as d,g as a,b as _,t as l,o as n,r as c,p as m,l as f}from"./app-572e7dbd.js";const v={class:"text-sm text-red-600"},$=u({__name:"InputError",props:{message:{}},setup(r){return(e,t)=>i((n(),a("div",null,[_("p",v,l(e.message),1)],512)),[[d,e.message]])}}),g={class:"block font-medium text-sm text-gray-700"},h={key:0},b={key:1},V=u({__name:"InputLabel",props:{value:{}},setup(r){return(e,t)=>(n(),a("label",g,[e.value?(n(),a("span",h,l(e.value),1)):(n(),a("span",b,[c(e.$slots,"default")]))]))}}),k=["value"],I=u({__name:"TextInput",props:{modelValue:{}},emits:["update:modelValue"],setup(r,{expose:e}){const t=m(null);return f(()=>{var s,o;(s=t.value)!=null&&s.hasAttribute("autofocus")&&((o=t.value)==null||o.focus())}),e({focus:()=>{var s;return(s=t.value)==null?void 0:s.focus()}}),(s,o)=>(n(),a("input",{class:"border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm",value:s.modelValue,onInput:o[0]||(o[0]=p=>s.$emit("update:modelValue",p.target.value)),ref_key:"input",ref:t},null,40,k))}});export{V as _,I as a,$ as b};
