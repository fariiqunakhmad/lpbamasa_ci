                                    <div id="kv-avatar-errors" class="center-block" style="width:800px;display:none"></div>
                                    <form class="text-center" method="post" enctype="multipart/form-data">
                                        <div class="kv-avatar center-block" style="width:200px">
                                            <input id="avatar<?php echo $nip;?>" name="avatar" type="file" class="file-loading">
                                        </div>
                                    </form>
                                    <script>
                                        $("#avatar<?php echo $nip;?>").fileinput({
                                            uploadUrl: "<?php echo base_url().'pegawai/upload_photo/'.$nip;?>", // server upload action
                                            uploadAsync: true,
                                            overwriteInitial: true,
                                            maxFileSize: 10000,
                                            showClose: false,
                                            showCaption: false,
                                            browseLabel: 'Ubah Foto',
                                            browseIcon: '',
                                            elErrorContainer: '#kv-avatar-errors',
                                            msgErrorClass: 'alert alert-block alert-danger',
                                            defaultPreviewContent: '<img src="<?php echo base_url().$photo;?>" alt="Your Avatar" style="width:160px">',
                                            layoutTemplates: {main2: '{preview} {browse}'},
                                            allowedFileExtensions: ["jpg"],
                                            uploadExtraData: function(previewId, index) {
                                                return {key: index};
                                            }
                                        });     
                                    </script>
