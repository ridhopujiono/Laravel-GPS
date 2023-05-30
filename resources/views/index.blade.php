<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Halaman Absen</title>
</head>
<body>
    
<style>
    #mapid {
            height: 400px;
        }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Attendance</div>

                <div class="card-body">
                    <div id="mapid"></div>

                    <form action="{{ url('attendance') }}" id="form-submit" method="POST">
                        @csrf
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                        <button onClick="attendance()" type="button" class="btn btn-primary mt-3" id="check-in-btn">Check In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/geolib@3.3.3/lib/index.min.js"></script>
<script>
    

    function attendance(){
        // Mendapatkan lokasi saat ini pengguna
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function(position) {
                // ini posisi saat ini
                var userLatitude = position.coords.latitude;
                var userLongitude = position.coords.longitude;

                // ini posisi kantor
                var office = { latitude: -6.922116, longitude: 112.1054172 };

                // ini jarak keduanya
                var distance = geolib.getDistance(office, { latitude: userLatitude, longitude: userLongitude });
        
                if (distance < 10000) {
                    document.getElementById('latitude').value = userLatitude;
                    document.getElementById('longitude').value = userLongitude;
                    document.getElementById('form-submit').submit()
                } else {
                    console.log("Tidak Terjangkau")
                    alert('Anda berada di luar radius kantor. Silakan dekatkan diri ke kantor untuk check in.');
                }
            });
        }
    }




</script>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>