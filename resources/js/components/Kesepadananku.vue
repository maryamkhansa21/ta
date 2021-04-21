<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Kesepadanan Keterampilan Umum SN Dikti dengan Program Studi</h3>

                <div class="card-tools">
                     <button class="btn btn-success" @click="newModal">Tambah <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th>Code</th>
                      <th>Keterampilan Umum SN Dikti</th>
                      <th>Keterampilan Umum Prodi</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr v-for="kesepadananku in kesepadananku" :key="kesepadananku.id">
                      <td>{{kesepadananku.code}}</td>
                      <td>{{kesepadananku.kudikti}}</td>
                      <td>{{kesepadananku.kuprodi}}</td>
                      <td>
                          <a href="#" @click="editModal(kesepadananku)">
                              <i class="fas fa-edit fa-fw"></i>
                          </a>
                          
                          <a href="#" @click="deleteKesepadananku(kesepadananku.id)">
                              <i class="fas fa-trash fa-fw"></i>
                          </a>
                      </td>
                    </tr>
                    <tr>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1"  role="dialog"
        aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title" v-show="!editMode" id="addNewLabel">Tambah Kesepadanan Keterampilan Umum</h5>
                 <h5 class="modal-title" v-show="editMode" id="addNewLabel">Update Kesepadanan Keterampilan Umum</h5>
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? updateKesepadananku() : createKesepadananku()">
            <div class="modal-body">
               <div class="form-group">
                <input v-model="form.code" type="text" name="code"
                    placeholder="Code"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('code') }">
                <has-error :form="form" field="code"></has-error>
                </div>

                <div class="form-group">
                <input v-model="form.kudikti" type="text" name="kudikti"
                    placeholder="Keterampilan Umum DIKTI"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('kudikti') }">
                <has-error :form="form" field="kudikti"></has-error>
                </div>

                 <div class="form-group">
                <input v-model="form.kuprodi" type="text" name="kuprodi"
                    placeholder="Keterampilan Umum PRODI"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('kuprodi') }">
                <has-error :form="form" field="kuprodi"></has-error>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button v-show="editMode" type="submit" class="btn btn-success">Update</button>
                <button v-show="!editMode" type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    const URL = "http://localhost:8000/";
    export default {
        data () {
            return {
                editMode: false,
                kesepadananku : [],
                form:new Form({
                    code :'',
                    kudikti:'',
                    kuprodi:''
                })
            }
        },
        methods:{
           updateKesepadananku(){
                this.form.put(URL+'api/kesepadananku'+this.form.id);
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )
                     
                         Fire.$emit('AfterCreate');
                
            },
            editModal(kesepadananku){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(kesepadananku);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
           deleteKesepadananku(id){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        // Send request to the server
                         if (result.value) {
                                this.form.delete(URL+'api/kesepadananku/'+id).then(()=>{
                                        Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreate');
                                }).catch(()=> {
                                    swal("Failed!", "There was something wronge.", "warning");
                                });
                         }
                    })
            },
          loadKesepadananku(){
              axios.get(URL+'api/kesepadananku').then(data => {
                  this.kesepadananku = data.data.data;
              });
          },
          loadprofillulusan(){
              axios.get(URL+'api/kesepadananku').then(data => {
                  this.kesepadananku = data.data.data;
              });
          },
          createKesepadananku(){
            this.form.post(URL+'api/kesepadananku');
            $('#addNew').modal('hide')
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
          }
        },
        created() {
            this.loadKesepadananku();
        }
    }
</script>

