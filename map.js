
var map = null;
var geocoder;
function initMap(){
    var options = {
        zoom:14,
        center:{lat:28.644800,lng:77.216721}
      };

      map = new google.maps.Map(document.getElementById('map'), options);
    //marker on customer location  
    
    
    
    var cdata = JSON.parse(document.getElementById('data').innerHTML);
    codeAddress(cdata);
    
    var allData = JSON.parse(document.getElementById('allData').innerHTML);
    showMarker(allData);
    
    
    if (navigator.geolocation)
        navigator.geolocation.getCurrentPosition(success,fail)
    else alert("Failed to locate");
}

function success(position){
    
    var marker = new google.maps.Marker({
            position : new  google.maps.LatLng(position.coords.latitude,position.coords.longitude),
            map : map,
            draggable: true,
            animation: google.maps.Animation.DROP
        });
        
        var infoWindow = new google.maps.InfoWindow({
            content:"YOUR CURRENT LOCATION"
          })
        marker.addListener('mouseover', function(){
            infoWindow.open(map, marker);
          });
    
        //map.setCentre(position.coords.latitude,position.coords.longitude);
        map.panTo(marker.getPosition());
    
        marker.addListener('click', function() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      });
    
}

function fail(error){
    errorType = {
        0 : "Unknown Error",
        1 : "Permission Denied by user",
        2 : "Position not available",
        3 : "Request Timed Out"
    };
    
    errMsg = errorCode[error];
    if(error.code==0 || error.code==0)
        errMsg = errMsg + " " +error.message;
    alert(errMsg);
}

function toggleBounce() {
        if (marker.getAnimation() !== null) {
          marker.setAnimation(null);
        } else {
          marker.setAnimation(google.maps.Animation.BOUNCE);
        }
      }

function codeAddress(cdata){
    
    Array.prototype.forEach.call(cdata,function(data){
       var address = data[1]+", "+data[4]+", "+data[5]+", "+data[6]+", "+data[7];
    console.log(address);
    geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address':address},function(results,status){
        if (status == 'OK'){
            
            var points = {};
            points.id = data[0];
            points.lat =results[0].geometry.location.lat;
            points.lng =results[0].geometry.location.lng;
            updateLocation(points);
         
           
        }
        
        else
            {
                alert('Geocode was not successful for the following reasons :'+status );
            }
    }); 
    });
    
}


function updateLocation(points){
    $.post("fill_location.php",{ gid:points.id ,lat:points.lat ,lng:points.lng},function(returned_data){
        console.log(returned_data);
    });
}



function showMarker(allData){
    Array.prototype.forEach.call(allData,function(data){
        var marker = new google.maps.Marker({
            position : new  google.maps.LatLng(data[9],data[10]),
            map : map,
        });
        
        var infoWindow = new google.maps.InfoWindow({
            content:data[1]+"  CONTACT :"+data[3]
          })
        marker.addListener('mouseover', function(){
            infoWindow.open(map, marker);
          });
    });
}