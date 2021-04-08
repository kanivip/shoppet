
$(document).ready(function(){
    $('#mi-slider').catslider();
    //check username
    $('#username').keyup(function(){
        var un = $('#username').val();
        $.post("./Ajax/checkUsername",{un:un},function(data){
            $('#warn').html(data);
        })
    });
    //check password
    $("#password").keyup(function () {
        $("#password").each(function () {
            var validated =  true;
            if(this.value.length < 8)
                validated = false;
            if(!/\d/.test(this.value))
                validated = false;
            if(!/[a-z]/.test(this.value))
                validated = false;
            if(!/[A-Z]/.test(this.value))
                validated = false;
            if(/[^0-9a-zA-Z]/.test(this.value))
                validated = false;
            if(!validated)
                $('#warnpass').html("Mât khẩu có 1 kí tự hoa </br>"+
                "Mât khẩu có trên 8 kí tự</br>"+
                "Mât khẩu có 1 kí tự số</br>"+
                "Bảo mật yếu");
            else
                $('#warnpass').html("Bảo mật mạnh");
        });
    });

    $("#repassword").keyup(function () {
        var pass = $("#password").val();
        var repass = $("#repassword").val();
        if(pass !=repass)
            $("#warnrepass").text("Mật khẩu chưa khớp");
        else
            $("#warnrepass").text("Mật khẩu hợp lệ");
    });

    //đăng kí tài khoản
    $('#register').on("click",function(){
        var un = $('#username').val();
        var pass = $('#password').val();
        var repass = $('#repassword').val();
        $.post("./Ajax/insertUser",{un:un,pass:pass,repass:repass},function(data){
            $('#resultRegister').html(data);
            if(data =='Tạo tài khoản thành công')
            {
            $('#username').val('');
            $('#password').val('');
            $('#repassword').val('');
            $('#warnpass').html("");
            $("#warnrepass").text("");
            $('#warn').html("");
            }
        })
    });

    //đăng nhập
    $('#btn-login').on("click",function(){
        var un = $('#usernameLG').val();
        var pass = $('#passwordLG').val();
        $.post("./Ajax/checkLogin",{un:un,pass:pass},function(data){
            if(data != "false")
            {
                $(".modal:visible").modal('toggle');
                $("#dropdownMenu2").text(data);
                location.reload();
            }
                else
                    $('#resultLG').text('Tài khoản hoặc mật khẩu sai');
        })
    });
    //đăng xuất
    $('#logout').on("click",function(){
        $.post("./Ajax/Logout");
        location.reload();
    });

    // đưa dữ liệu sản phẩm lên model sữa

    $(".UpdateProduct").on("click",function(){
          var idsp = $(this).val();
          $.post("./Ajax/GetProductById",{idsp:idsp},function(data){
              var arr = JSON.parse(data);
              $('#txtten').val(arr[0].ten);
              $('#txtgia').val(arr[0].gia);
              $('#txtsl').val(arr[0].soluong);
              $('#optloai').val(arr[0].loai);
              $('#txtnd').val(arr[0].noidung);
              $('#hinh').attr("src",arr[0].anh);
              $('#idsp').val(idsp);
          })
    });

    $(".UpdateBill").on("click",function(){
        var idhd = $(this).val();
        $.post("./Ajax/GetBillById",{idhd:idhd},function(data){
            var arr = JSON.parse(data);
            $('#idhd').val(arr[0].idhd);
            $('#txtusername').val(arr[0].username);
            $('#tp').val(arr[0].tp.matp);
            matp = $('#tp').val();
            
            $.ajax({
                type:'POST',
                url: './Ajax/GetDistrictById',
                data: {matp:matp},
                success: function(data){
                    $("#qh1").html(data);
                    $("#qh1").show();
                    $('#qh').val(arr[0].qh.maqh);
                    var maqh = $("#qh").val();

                         $.ajax({
                             type:'POST',
                             url: './Ajax/GetXaById',
                             data: {maqh:maqh},
                             success: function(data){
                                 $("#xp1").html(data);
                                 $("#xp1").show();
                                 $('#xp').val(arr[0].xp.xaid);
                                 $("#xp").on("change",function(){
                                    $("#dc1").show();
    
                                });
                             }  
                    });
                }
            });

            $('#txtsonha').val(arr[0].sn);
            $('#txttongtien').val(arr[0].tongtien);
            $('#txtsdt').val(arr[0].sdt);
            $('#txthoten').val(arr[0].hoten);
            $('#trangthai').val(arr[0].TrangThai);
        })
  });

    // sroll load thêm sản phẩm
    $('#loader').on('inview', function(event, isInView) {
        if (isInView) {
            var nextPage = parseInt($('#pageno').val())+1;
            var loai =  $('#loai').val();
            $.ajax({
                type: 'POST',
                url: './public/pagination.php',
                data: { pageno: nextPage,loai: loai },
                success: function(data){
                    if(data != ''){							 
                        $('#producttest').append(data);
                        $('#pageno').val(nextPage);
                    } else {								 
                        $("#loader").hide();
                    }
                }
            });
        }
    });
    // hiện thị địa chỉ
    $("#tp").on("change",function(){
        var matp =$("#tp").val();
        $.ajax({
            type:'POST',
            url: './Ajax/GetDistrictById',
            data: {matp:matp},
            success: function(data){
                $("#qh1").html(data);
                $("#qh1").show();
                
                $("#qh").on("change",function(){
                    var maqh = $("#qh").val();
                     $.ajax({
                         type:'POST',
                         url: './Ajax/GetXaById',
                         data: {maqh:maqh},
                         success: function(data){
                             $("#xp1").html(data);
                             $("#xp1").show();
                             
                             $("#xp").on("change",function(){
                                $("#dc1").show();

                            });
                         }
                     });
                });
            }
        });
    });
    //giao diện modal radio
    
    $("#divloai").hide(); 
    $("#divgia").hide(); 

    $('#radCheck1').click(function() {
        if($('#radCheck1').is(':checked')) {
            $("#divid").show();
             $("#divloai").hide(); 
             $("#divgia").hide(); 
            }
     });

    $('#radCheck2').click(function() {
        if($('#radCheck2').is(':checked')) {
            $("#divloai").show();
             $("#divid").hide(); 
             $("#divgia").hide(); 
            }
     });

     $('#radCheck3').click(function() {
        if($('#radCheck3').is(':checked')) {
            $("#divgia").show();
             $("#divid").hide(); 
             $("#divloai").hide(); 
            }
     });
     //end

     //opt modal add sale 
     $("#txtid").keyup(function(){

            var key = $("#txtid").val();
            $.ajax({
                type:'POST',
                url:'./Ajax/SelectNameLimit',
                data:{col:'TenSP',num:8,key:key},
                success: function(data){
                    $("#browsers").html(data);
                }
            });
        }
     );

     //searching admin product
     $("#txtsearchSP").keyup(function(){
        var column = $("#optcolumnSP").val();
        var key = $("#txtsearchSP").val();
        $.ajax({
            type:'POST',
            url:'./Ajax/SelectAllLimit',
            data:{col:column,num:10,key:key},
            success: function(data){
                $("#RowProduct").html(data);
            }
        });
     });

     $("#optcolumnSP").change(function(){
        var column = $("#optcolumnSP").val();
        var key = $("#txtsearchSP").val();
        $.ajax({
            type:'POST',
            url:'./Ajax/SelectAllLimit',
            data:{col:column,num:10,key:key},
            success: function(data){
                $("#RowProduct").html(data);
            }
        });
     });



     //searching admin bill
     $("#txtsearchHD").keyup(function(){
        var column = $("#optcolumnHD").val();
        var key = $("#txtsearchHD").val();
        $.ajax({
            type:'POST',
            url:'./Ajax/SelectAllLimitBill',
            data:{col:column,num:6,key:key},
            success: function(data){
                $("#RowBill").html(data);
            }
        });
     });

     $("#optcolumnHD").change(function(){
        var column = $("#optcolumnHD").val();
        var key = $("#txtsearchHD").val();
        $.ajax({
            type:'POST',
            url:'./Ajax/SelectAllLimitBill',
            data:{col:column,num:6,key:key},
            success: function(data){
                $("#RowBill").html(data);
            }
        });
     });


     //searching admin sale
     $("#txtsearchSale").keyup(function(){
        var column = $("#optcolumnSale").val();
        var key = $("#txtsearchSale").val();
        $.ajax({
            type:'POST',
            url:'./Ajax/SelectAllLimitSale',
            data:{col:column,num:10,key:key},
            success: function(data){
                $("#RowSale").html(data);
            }
        });
     });

     $("#optcolumnSale").change(function(){
        var column = $("#optcolumnSale").val();
        var key = $("#txtsearchSale").val();
        $.ajax({
            type:'POST',
            url:'./Ajax/SelectAllLimitSale',
            data:{col:column,num:10,key:key},
            success: function(data){
                $("#RowSale").html(data);
            }
        });
     });



});


