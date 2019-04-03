$("#state").change(event =>{
    $.get(`/cities/${event.target.value}`,function(res,state){
        $("#city").empty();
        res.forEach(element => {
            $("#city").append(`<option value=${element.id}> ${element.name} </option>`);
        });
    });
});



function seleccion(cantidad){
      if(cantidad == 2){
        document.getElementById("program").style.display="none";
        document.getElementById("program_1").style.display="none";
        document.getElementById("component").style.display="none";
        document.getElementById("subcomponent").style.display="none";
        document.getElementById("concept").style.display="none";
        document.getElementById("guardar").style.display="none";
        document.getElementById("labelcomponent").style.display="none";
        document.getElementById("labelsubcomponent").style.display="none";
        document.getElementById("labelconcept").style.display="none";
        document.getElementById("labelprogram").style.display="none";
        
        
      }else if(cantidad == 0){
       
        document.getElementById("program_1").style.display="inline";
         document.getElementById("program").style.display="none";
        document.getElementById("component").style.display="none";
        document.getElementById("subcomponent").style.display="none";
        document.getElementById("concept").style.display="inline";
         document.getElementById("guardar").style.display="inline";
        document.getElementById("labelcomponent").style.display="none";
        document.getElementById("labelsubcomponent").style.display="none";
        document.getElementById("labelconcept").style.display="inline";
        document.getElementById("labelprogram").style.display="inline";
       $("#program_1").change(event =>{
    $.get(`/programs/getPrograms/${event.target.value}`,function(res,program_1){
        $("#concept").empty();
        
        res.forEach(element => {
            $("#concept").append(`<div class=col-sm-10><label>*Cantidad Máxima por Persona Física</label> <textarea style=border:none; rows="4" cols="50" disabled> ${element.p_amount_max} </textarea></div>
                                    <div class=col-sm-10><label>*Cantidad Máxima por Persona Moral</label> <textarea style=border:none; rows="4" cols="50" disabled> ${element.m_amount_max} </textarea></div>
                                    </br><hr>`);
          
        });
    });
});

    }else if(cantidad==1){
        document.getElementById("program_1").style.display="none";
         document.getElementById("program").style.display="inline";
        document.getElementById("component").style.display="none";
        document.getElementById("subcomponent").style.display="none";
        document.getElementById("concept").style.display="inline";
        document.getElementById("labelcomponent").style.display="none";
        document.getElementById("labelsubcomponent").style.display="none";
        document.getElementById("labelconcept").style.display="inline";
        document.getElementById("labelprogram").style.display="inline";
        
        $("#program").change(event =>{
    $.get(`/components/getComponents/${event.target.value}`,function(res,program){
        $("#component").empty();
      document.getElementById("labelcomponent").style.display="inline";
      document.getElementById("component").style.display="inline";        document.getElementById("subcomponent").style.display="none";
        document.getElementById("labelsubcomponent").style.display="none";
        document.getElementById("labelconcept").style.display="inline";
        document.getElementById("concept").style.display="inline";

        $("#component").append(`<option value=0>Selecciona un componente</option>`);
        res.forEach(element => {
            $("#component").append(`<option value=${element.id}> ${element.name} </option>`);
          
        });
      
    });
});




$("#component").change(event =>{
    $.get(`/subcomponents/getSubComponents/${event.target.value}`,function(res,component){
        $("#subcomponent").empty();
        $("#subcomponent").append(`<option value=0>Selecciona un componente</option>`);
        res.forEach(element => {
            $("#subcomponent").append(`<option value=${element.id}> ${element.name} </option>`);
          
        });
     document.getElementById("subcomponent").style.display="inline";
              document.getElementById("labelsubcomponent").style.display="inline";

    });
});


$("#sub_component").change(event =>{
    $.get(`/concepts/getConcepts/${event.target.value}`,function(res,sub_component){
        $("#concept").empty();
      document.getElementById("concept").style.display="block";
              document.getElementById("labelconcept").style.display="block";

        res.forEach(element => {
            $("#concept").append(`<input class=border-checkbox type=checkbox name=concepts[] value=${element.id} required> ${element.name}<hr> 
                                    <div class=col-sm-10><label>*Cantidad Máxima por Persona Física</label> <textarea style=border:none; rows="4" cols="50" disabled> ${element.p_amount_max} </textarea></div>
                                    <div class=col-sm-10><label>*Cantidad Máxima por Persona Moral</label> <textarea style=border:none; rows="4" cols="50" disabled> ${element.m_amount_max} </textarea></div>
                                    </br><hr>`);
          
        });

      document.getElementById("guardar").style.display="inline";
    });
});

$("#component").change(event =>{
    $.get(`/concepts/getConcepts/${event.target.value}`,function(res,component){
        $("#concept").empty();
   document.getElementById("subcomponent").style.display="none";
              document.getElementById("labelsubcomponent").style.display="none";
        res.forEach(element => {
            $("#concept").append(`<input class=border-checkbox type=checkbox name=concepts[] value=${element.id} required> ${element.name}<hr> 
                                    <div class=col-sm-10><label>*Cantidad Máxima por Persona Física</label> <textarea style=border:none; rows="4" cols="50" disabled> ${element.p_amount_max} </textarea></div>
                                    <div class=col-sm-10><label>*Cantidad Máxima por Persona Moral</label> <textarea style=border:none; rows="4" cols="50" disabled> ${element.m_amount_max} </textarea></div>
                                    </br><hr>`);
            
           console.log($("#concept").val(element.id));
        });
         document.getElementById("guardar").style.display="inline";
    });
});
      
      
     
      
    }
}






