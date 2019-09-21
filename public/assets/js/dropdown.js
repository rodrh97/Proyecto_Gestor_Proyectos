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
       
        document.getElementById("program_0").style.display="inline";
        document.getElementById("labelprogram").style.display="inline";
        document.getElementById("component").style.display="none";
        document.getElementById("concept").style.display="none";
        document.getElementById("labelconcept").style.display="none";
        document.getElementById("subcomponent").style.display="none";
        document.getElementById("program_1").style.display="none";
        document.getElementById("guardar").style.display="none";
        document.getElementById("labelcomponent").style.display="none";
        document.getElementById("labelsubcomponent").style.display="none";
       
        
      
       $("#program_0").change(event =>{
    $.get(`/programs/getPrograms/${event.target.value}`,function(res,program_0){
        $("#concept").empty();
        var barrer=document.getElementById("concept");
            while(barrer.hasChildNodes()){
                    barrer.removeChild(barrer.firstChild);
                  }
        res.forEach(element => {
            $("#concept").append(`<div class=col-sm-10><label>*Cantidad Máxima por Persona Física</label> <textarea style=border:none; rows="4" cols="50" disabled> ${element.p_amount_max} </textarea></div>
                                    <div class=col-sm-10><label>*Cantidad Máxima por Persona Moral</label> <textarea style=border:none; rows="4" cols="50" disabled> ${element.m_amount_max} </textarea></div>
                                    </br><hr>`);
          
        });
        document.getElementById("concept").style.display="inline";
        document.getElementById("labelconcept").style.display="inline";
        document.getElementById("guardar").style.display="initial";
    });
       
});

    }else if(cantidad==1){
        document.getElementById("program_0").style.display="none";
         document.getElementById("program_1").style.display="inline";
        document.getElementById("component").style.display="none";
        document.getElementById("subcomponent").style.display="none";
        document.getElementById("concept").style.display="none";
        document.getElementById("labelcomponent").style.display="none";
        document.getElementById("labelsubcomponent").style.display="none";
        document.getElementById("labelconcept").style.display="none";
        document.getElementById("labelprogram").style.display="inline";
        document.getElementById("guardar").style.display="none";
        
        $("#program_1").change(event =>{
    $.get(`/components/getComponents/${event.target.value}`,function(res,program_1){
        $("#component").empty();
      document.getElementById("labelcomponent").style.display="inline";
      document.getElementById("component").style.display="inline";        
      document.getElementById("subcomponent").style.display="none";
        document.getElementById("labelsubcomponent").style.display="none";
        document.getElementById("concept").style.display="none";
        document.getElementById("labelconcept").style.display="none";
     document.getElementById("guardar").style.display="none";
        

        $("#component").append(`<option value=0>Selecciona una componente</option>`);
        res.forEach(element => {
            $("#component").append(`<option value=${element.id}> ${element.name} </option>`);
          
        });
      
    });
});




$("#component").change(event =>{
 
    $.get(`/subcomponents/getSubComponents/${event.target.value}`,function(res,component){
        $("#subcomponent").empty();
        console.log(res);
        $("#subcomponent").append(`<option value=0>Selecciona una subcomponente</option>`);
        if(Object.keys(res).length>0){

              Object.keys(res).forEach(element => {
                    $("#subcomponent").append(`<option value=${res[element].id}> ${res[element].name} </option>`);
                })
           document.getElementById("labelcomponent").style.display="inline";
           document.getElementById("component").style.display="inline";  
           document.getElementById("program_1").style.display="inline";
           document.getElementById("labelprogram").style.display="inline";
           document.getElementById("subcomponent").style.display="inline";
           document.getElementById("labelsubcomponent").style.display="inline";
           document.getElementById("concept").style.display="none";
           document.getElementById("labelconcept").style.display="none";
           document.getElementById("guardar").style.display="none";
          
          $.get(`/concepts/getConcepts_com/${event.target.value}`,function(res,component){
           console.log("res");
           var barrer=document.getElementById("concept");
            while(barrer.hasChildNodes()){
                    barrer.removeChild(barrer.firstChild);
                  }
             Object.keys(res).forEach(element => {
                    $("#concept").append(`<input class=border-checkbox type=checkbox name=concepts[] value=${res[element].id}> ${res[element].name}<hr> 
                                    <div class=col-sm-10><label>*Cantidad Máxima por Persona Física</label> <textarea style=border:none; rows="4" cols="50" disabled> ${res[element].p_amount_max} </textarea></div>
                                    <div class=col-sm-10><label>*Cantidad Máxima por Persona Moral</label> <textarea style=border:none; rows="4" cols="50" disabled> ${res[element].m_amount_max} </textarea></div>
                                    </br><hr>`);
                })
                document.getElementById("concept").style.display="inline";
                document.getElementById("labelconcept").style.display="inline";
                document.getElementById("guardar").style.display="inline";
           
           });
           
        }else{
           $.get(`/concepts/getConcepts_com/${event.target.value}`,function(res,component){
           console.log("res");
           var barrer=document.getElementById("concept");
            while(barrer.hasChildNodes()){
                    barrer.removeChild(barrer.firstChild);
                  }
             Object.keys(res).forEach(element => {
                    $("#concept").append(`<input class=border-checkbox type=checkbox name=concepts[] value=${res[element].id}> ${res[element].name}<hr> 
                                    <div class=col-sm-10><label>*Cantidad Máxima por Persona Física</label> <textarea style=border:none; rows="4" cols="50" disabled> ${res[element].p_amount_max} </textarea></div>
                                    <div class=col-sm-10><label>*Cantidad Máxima por Persona Moral</label> <textarea style=border:none; rows="4" cols="50" disabled> ${res[element].m_amount_max} </textarea></div>
                                    </br><hr>`);
                })
                document.getElementById("subcomponent").style.display="none";
                document.getElementById("labelsubcomponent").style.display="none";
                document.getElementById("concept").style.display="inline";
                document.getElementById("labelconcept").style.display="inline";
                document.getElementById("guardar").style.display="inline";
           
           });

     }
       

    });
}); 
  $("#subcomponent").change(event =>{
 
    $.get(`/concepts/getConcepts/${event.target.value}`,function(res,subcomponent){
        $("#concept").empty();
        console.log(res);
        var barrer=document.getElementById("concept");
            while(barrer.hasChildNodes()){
                    barrer.removeChild(barrer.firstChild);
                  }
        if(Object.keys(res).length>0){
        document.getElementById("subcomponent").style.display="inline";
        document.getElementById("labelsubcomponent").style.display="inline";
        document.getElementById("concept").style.display="inline";
        document.getElementById("labelconcept").style.display="inline";
        document.getElementById("guardar").style.display="inline";
        Object.keys(res).forEach(element => {
            $("#concept").append(`<input class=border-checkbox type=checkbox name=concepts[] value=${res[element].id}> ${res[element].name}<hr> 
                                    <div class=col-sm-10><label>*Cantidad Máxima por Persona Física</label> <textarea style=border:none; rows="4" cols="50" disabled> ${res[element].p_amount_max} </textarea></div>
                                    <div class=col-sm-10><label>*Cantidad Máxima por Persona Moral</label> <textarea style=border:none; rows="4" cols="50" disabled> ${res[element].m_amount_max} </textarea></div>
                                    </br><hr>`);
          
        })
        }
       

    });
});
 




 
  
      
    }
}






