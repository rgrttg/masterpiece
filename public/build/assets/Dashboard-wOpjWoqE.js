import{u as c,e as a,o as n,c as r,b as o,d as l,t as _,g as p,F as h}from"./app-Bf6d-8Iy.js";/* empty css            */const i={__name:"LogoutButton",setup(u){const t=c(),e=a(),s=async()=>{await e.logout().then(()=>{t.push("/login")})};return(d,g)=>(n(),r("button",{type:"button",onClick:s},"Logout "))}},m=o("span",null,"Dashboard",-1),B={__name:"Dashboard",setup(u){const t=a();return(e,s)=>(n(),r(h,null,[o("header",null,[l(i)]),m,o("h1",null,"Hallo "+_(p(t).authUser.name),1)],64))}};export{B as default};
