import{_ as c}from"./AppLayout-dcd69305.js";import p from"./DeleteUserForm-fa7f65dd.js";import l from"./LogoutOtherBrowserSessionsForm-263217e3.js";import{S as s}from"./SectionBorder-8d7a176e.js";import f from"./TwoFactorAuthenticationForm-ac099ee0.js";import u from"./UpdatePasswordForm-b3f73435.js";import _ from"./UpdateProfileInformationForm-a70e7f30.js";import{o,c as d,w as n,a as i,e as r,b as t,f as a,F as h}from"./app-51e4c582.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./DialogModal-9497123c.js";import"./SectionTitle-ea25a8a8.js";import"./DangerButton-774d6d85.js";import"./TextInput-4d9ea1ca.js";import"./SecondaryButton-2e00beec.js";import"./ActionMessage-ee93e193.js";import"./PrimaryButton-d098e554.js";import"./InputLabel-73e69ecb.js";import"./FormSection-af6c7e05.js";const g=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Profile ",-1),$={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={key:0},k={key:1},y={key:2},z={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array},setup(m){return(e,x)=>(o(),d(c,{title:"Profile"},{header:n(()=>[g]),default:n(()=>[i("div",null,[i("div",$,[e.$page.props.jetstream.canUpdateProfileInformation?(o(),r("div",w,[t(_,{user:e.$page.props.auth.user},null,8,["user"]),t(s)])):a("",!0),e.$page.props.jetstream.canUpdatePassword?(o(),r("div",k,[t(u,{class:"mt-10 sm:mt-0"}),t(s)])):a("",!0),e.$page.props.jetstream.canManageTwoFactorAuthentication?(o(),r("div",y,[t(f,{"requires-confirmation":m.confirmsTwoFactorAuthentication,class:"mt-10 sm:mt-0"},null,8,["requires-confirmation"]),t(s)])):a("",!0),t(l,{sessions:m.sessions,class:"mt-10 sm:mt-0"},null,8,["sessions"]),e.$page.props.jetstream.hasAccountDeletionFeatures?(o(),r(h,{key:3},[t(s),t(p,{class:"mt-10 sm:mt-0"})],64)):a("",!0)])])]),_:1}))}};export{z as default};