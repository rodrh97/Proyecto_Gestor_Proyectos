$("#state").change(event =>{
    $.get(`/cities/${event.target.value}`,function(res,state){
        $("#city").empty();
        res.forEach(element => {
            $("#city").append(`<option value=${element.id}> ${element.name} </option>`);
        });
    });
});
