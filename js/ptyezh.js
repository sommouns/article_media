//��Ʒ������ɸѡ
function typeonc(x,y){
ptype2.location="../tem/protype2zh.php?type1id="+x;
document.getElementById("type1name").innerHTML=y+" >> ";
document.f1.type1id.value=x;
document.getElementById("type2name").innerHTML="";
document.getElementById("type3name").innerHTML="";
document.f1.type2id.value=0;
document.f1.type3id.value=0;
ptype3.location="../tem/protype3zh.php";

}

function tjadd(w,u){
 if(document.f1.type1id.value=="0"){alert("��ѡ����Ʒ���");return false;}	
 if(1==u){if(document.f1.t1.value==""){alert("�������Ա�ʺ�");return false;}}
 if(document.getElementById("C1").checked==false){alert("�����Ķ���ͬ����Ʒ������֪����");return false;}
 f1.action=w+"?control=add";
}
function tjupdate(w,x,y){
 if(document.f1.type1id.value=="0"){alert("��ѡ����Ʒ���");return false;}	
 if(document.getElementById("C1").checked==false){alert("�����Ķ���ͬ����Ʒ������֪����");return false;}
 f1.action=w+"?control=update&id="+x+"&bh="+y;
}

//��ƷͼƬ����ƶ�
function tphover(x){
 try{document.getElementById("tpf"+x).tover();    //����FF��ie8
 }catch(e){
 window.frames["tpf"+x].tover();    //����IE6��7
 }
}
function tphout(x){
 try{document.getElementById("tpf"+x).tout();    //����FF��ie8
 }catch(e){
 window.frames["tpf"+x].tout();    //����IE6��7
 }
}
