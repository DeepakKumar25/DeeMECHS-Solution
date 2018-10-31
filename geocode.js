function geocode(data){
//    var data =JSON.parse(document.getElementById('data').innerHTML);
 
    var address = data[1]+", "+data[4]+", "+data[5]+", "+data[6]+", "+data[7];
//    console.log(address);
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address':address},function(results,status){
        if (status == 'OK'){
            map.setCentre(results[0].geometry.location);
            alert(results[0].geometry.location);
        }
        
        else
            {
                alert('Geocode was not successful for the following reasons :'+status );
            }
    });
}