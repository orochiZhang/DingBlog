function getTags(id) {
    $.ajax({
        type: "GET",
        url: "/api/tag/all",
        dataType: "json",
        success: function(data){
            for(var d in data.tags) {
                var option=document.createElement("option");
                option.value=data.tags[d].id;
                if(option.value==id){
                    option.selected = true
                }
                option.innerText=data.tags[d].name;
                $('#tag').append(option);
            }
        }
    });
}

function getTypes(id) {
    $.ajax({
        type: "GET",
        url: "/api/type/all",
        dataType: "json",
        success: function(data){
            for(var d in data.types) {
                var option=document.createElement("option");
                option.value=data.types[d].id;
                if(option.value==id){
                    option.selected = true
                }
                option.innerText=data.types[d].name;
                $('#type').append(option);
            }
        }
    });
}