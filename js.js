function crud (){
  function createListeners(){
    let h1=document.getElementById('h1');
    document.getElementById('c').addEventListener('click',function(){
      h1.innerHTML="Criar";
      forms(h1);
    })
    document.getElementById('r').addEventListener('click',function(){
      h1.innerHTML="Read";
      forms(h1);
    })
    document.getElementById('u').addEventListener('click',function(){
      h1.innerHTML="Update";
      forms(h1);
    })
    document.getElementById('d').addEventListener('click',function(){
      h1.innerHTML="Delete";
      forms(h1);
    })
  }
  function forms(h1){
    h1=h1.innerHTML;
    h1 == "Criar" ? document.getElementById("form_cadastro").style.display="block" : document.getElementById("form_cadastro").style.display="none";
    h1 == "Read" ? document.getElementById("read").style.display="block": document.getElementById("read").style.display="none";
    h1 == "Update" ? document.getElementById("modi").style.display="block" : document.getElementById("modi").style.display="none";
    h1 == "Delete" ? document.getElementById("delete").style.display="block" : document.getElementById("delete").style.display="none";
  }
  createListeners();
}
function validar_cadastro(){
  let nome = document.getElementById('nome');
  let telefone = document.getElementById('telefone');
  if(nome.value == "" || nome.value.length < 2){
    alert("Preencha o campo de nome corretamente");
    return false;
  }else if(telefone.value == "" || telefone.value.length < 2 || telefone.value.length > 14){
    alert("Preencha o campo de telefone corretamente");
    return false;
  }
}
function redirecionar_delete(id){
  window.location.href="php/php.php?a=d&id="+id;
}
function redirecionar_modi(id){
  let inputs_nome = document.getElementById('nome_modi_'+id);
  let fone=document.getElementById('fone_modi_'+id);
  let save=document.getElementById(id);
  if(inputs_nome.style.pointerEvents=="none" && fone.style.pointerEvents=="none" ||inputs_nome.style.pointerEvents=="" && fone.style.pointerEvents==""){
    inputs_nome.style.pointerEvents="all";
    fone.style.pointerEvents="all";
    inputs_nome.style.borderBottom="2px cornflowerblue solid";
    fone.style.borderBottom="2px cornflowerblue solid";
    save.style.display="block";
  }else{
    inputs_nome.style.pointerEvents="none";
    fone.style.pointerEvents="none";
    inputs_nome.style.borderBottom="0";
    fone.style.borderBottom="0";
    save.style.display="none";
  }
}
function fechar_form(){
  let box=document.getElementById('view');
  box.style.display="none";
}
function save(id){
  let id_usu=document.getElementById("id_"+id);
  let inputs_nome = document.getElementById('nome_modi_'+id);
  let fone=document.getElementById('fone_modi_'+id);
  if(inputs_nome.value == "" || inputs_nome.value.length < 2){
    alert("Preencha o campo de nome corretamente");
  }else if(fone.value == "" || fone.value.length < 9 || fone.value.length >= 15){
    alert("Preencha o campo de telefone corretamente");
  }else{
    window.location.href="php/php.php?a=u&id="+id_usu.value+"&nome="+inputs_nome.value+"&fone="+fone.value;
  }
}
function formatar_fone(id){
  let fone=document.getElementById(id);
  if(fone.value.length == 2){
    fone.value=fone.value+" ";
  }
  if(fone.value.length == 7){
    fone.value=fone.value+"-";
  }
}
crud();