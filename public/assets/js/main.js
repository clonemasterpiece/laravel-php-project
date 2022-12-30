$(document).ready(function () {

    const token = $('meta[name="csrf-token"]').attr('content');

        //filter by date-registration
        $("#date").change(filterbyRdate);
        //filter by date-log in
        $("#dateLogIn").change(filterByLogInDate);
        //filter by date-logged out
        $("#dateLogOut").change(filterByLoggedOutDate);
        //search
        $("#search").click(search);
        //filter
        $(".filter-btn-click").click(filter);

function ajaxCallBAck(url, method, data, result){
    $.ajax({
        url:url,
        headers: {'X-CSRF-TOKEN': token},
        method:method,
        dataType:"json",
        data:data,
        success:result,
        error:function(xhr){
            //console.log(xhr.responseText);
        }
    });
}
    //funkcija za filter by date-registration
    function filterbyRdate() {
        var valueDate = $(this).val();

        var valueToSend = {
            valueDate: valueDate
        }

        ajaxCallBAck("/statistics/registration", "POST", valueToSend, function (result) {
            writeRegistrationUsers(result.dateUsers);
        });
    }

    //funkcija za ispis iz prethodne funkcije
    function writeRegistrationUsers(arrayUsers) {
        var html4 = "";
        var html5 = "";
        html4 += `<thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">first name</th>
                    <th scope="col">last name</th>
                    <th scope="col">email</th>
                    <th scope="col">role</th>
               </tr>
            </thead>
            <tbody>`
        if (arrayUsers.length != 0) {
            for (var obj9 of arrayUsers) {
                html4 += `<tr>
                             <th scope="row">${obj9.id_user}</th>
                             <td name="nameUser">${obj9.name_user}</td>
                             <td name="lastNameUser">${obj9.last_name}</td>
                             <td name="emailUser">${obj9.email_user}</td>
                             <td name="roleUser">${obj9.role.role}</td>
                        </tr>
                    </tbody>`
            }
        } else {
            html5 += `<div class="alert alert-dark">There are no registered users on this date!</div>`
        }
        $("#users").html(html4);
        $("#text").html(html5);
    }

    //funkcija za filter by date-log in
    function filterByLogInDate() {
        var valueDate = $(this).val();

        var valueToSend = {
            valueDate: valueDate
        }

        ajaxCallBAck("/statistics/login", "POST", valueToSend, function (result) {
            writeUsers(result.users, result.roles);
        });
    }

    //funkcija za ispis iz prethodne funckije
    function writeUsers(arrayUsers, arrayRoles) {
        var html6 = "";
        var html7 = "";
        if (arrayUsers.length != 0) {
            for (var obj10 of arrayUsers) {
                html6 += `<tr>
                        <th scope="row">${obj10.user.id_user}</th>
                        <td name="nameUser">${obj10.user.name_user}</td>
                        <td name="lastNameUser">${obj10.user.last_name}</td>
                        <td name="emailUser">${obj10.user.email_user}</td>`
                for (var obj11 of arrayRoles) {
                    if (obj11.id_roles == obj10.user.id_roles) {
                        html6 += `<td name="roleUser">${obj11.role}</td>`
                    }
                }
                html6 += `</tr>`
            }
        } else {
            html7 += `<div class="alert alert-dark">There are no loged in users on this date!</div>`
        }
        $("#usersLoggedIn").html(html6);
        $("#text").html(html7);
    }

    //funkcija za filter by date-logged out
    function filterByLoggedOutDate() {
        var valueDate = $(this).val();

        var valueToSend = {
            valueDate: valueDate
        }

        ajaxCallBAck("/statistics/logout", "POST", valueToSend, function (result) {
            writeUsers(result.users, result.roles);
        });
    }

    //funkcija za search
    function search(e) {
        e.preventDefault();
        var keyword = $("#search-item").val();

        valueToSend = {
            keyword : keyword
        }

        ajaxCallBAck('/search/' + keyword, "post", valueToSend, function (result) {
            writeProducts(result);
        });
    }

    //funkcija za ispis proizvoda iz ajaxa
    function writeProducts(arrayProducts) {
        var html = "";
        if (arrayProducts.length != 0) {
            for (var obj of arrayProducts) {
                html += `  <div class="col-10 col-sm-6 col-lg-4 mx-auto my-3 store-item" data-item="${obj.id}">
                    <div class="card ">
                        <div class="img-container">
                                <img width="400px" src="assets/img/smallGallery/${obj.src}" class="card-img-top store-img" alt="${obj.alt}">

                        </div>
                        <div class="card-body">
                            <div class="card-text d-flex justify-content-between text-capitalize">
                                <h5 id="store-item-name">${obj.name}</h5>
                                <h5 class="store-item-value">${obj.cena}
                                    <strong id="store-item-price" class="font-weight-bold"> RSD </strong>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>`
            }
        }
        else {
            html += `<h1 class="text-center">There are no products!</h1>`
        }
        $("#store-items").html(html);
    }
        //funkcija za filter
        function filter(e) {
            e.preventDefault();
            var category_id = $(this).attr("data-filter");


            valueSend = {
                category_id : category_id
            }
            ajaxCallBAck('/filter/' + category_id, "post", valueSend, function (result) {
                writeProducts(result);
            });
        }

}
)
