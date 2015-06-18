(document).ready(function(){
    $('pegawai').bootstrapValidator({
        fields:{
            tlpp:{
                validators:{
                    notEmpty:{
                        message:"hgfhgf"
                    },
                    regexp:{
                        regexp:/^[0-9]+$/,
                        message:"Hanya angka"
                    }
                }
            }
        }
    }).on('success.form.bv', function(){});
});

