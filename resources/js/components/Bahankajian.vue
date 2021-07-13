<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pemilihan Bahan Kajian</h3>

                <div class="card-tools">
                     <button class="btn btn-success" @click="newModal">Tambah <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr role="row">
                      <th>Rumpun Keilmuan</th>
                      <th>Bahan Kajian</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr v-for="bahankajian in bahankajian" :key="bahankajian.id">
                      <td>{{bahankajian.rumpunkeilmuan}}</td>
                      <td>{{bahankajian.bahankajian}}</td>
                      <td>
                          <a href="#" @click="editModal(bahankajian)">
                              <i class="fas fa-edit fa-fw"></i>
                          </a>

                          <a href="#" @click="deleteBahankajian(bahankajian.id)">
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
                 <h5 class="modal-title" v-show="!editMode" id="addNewLabel">Tambah Bahan Kajian</h5>
                 <h5 class="modal-title" v-show="editMode" id="addNewLabel">Update Bahan Kajian</h5>
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form @submit.prevent="editMode ? updateBahankajian() : createBahankajian()">
            <div class="modal-body">
               <div class="form-group">
                     <select name="rumpunkeilmuan" v-model="form.rumpunkeilmuan" id="rumpunkeilmuan" class="form-control" :class="{ 'is-invalid': form.errors.has('rumpunkeilmuan') }">
                            <option value="Rumpun Keilmuan Kajian Umum">Rumpun Keilmuan Kajian Umum (KU)</option>
                            <option value="Rumpun Keilmuan Dasar">Rumpun Keilmuan Dasar (KD)</option>
                            <option value="Rumpun Keilmuan Iptek Pendukung">Rumpun Keilmuan Iptek Pendukung (KP)</option>
                            <option value="Rumpun Keilmuan Inti">Rumpun Keilmuan Inti (KI)</option>
                        </select>
                        <has-error :form="form" field="rumpunkeilmuan"></has-error>
                  </div>

                <div class="form-group">
                <input v-model="form.bahankajian" type="text" name="bahankajian"
                    placeholder="Bahan Kajian"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('bahankajian') }">
                <has-error :form="form" field="bahankajian"></has-error>
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
                bahankajian : [],
                form:new Form({
                    rumpunkeilmuan :'',
                    bahankajian:''
                })
            }
        },
        methods:{
           updateBahankajian(){
                this.form.put(URL+'api/bahankajian'+this.form.id);
                    $('#addNew').modal('hide');
                     Swal.fire(
                        'Updated!',
                        'Information has been updated.',
                        'success'
                        )

                         Fire.$emit('AfterCreate');

            },
            editModal(bahankajian){
                this.editMode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(bahankajian);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
           deleteBahankajian(id){
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
                                this.form.delete(URL+'api/bahankajian/'+id).then(()=>{
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
          loadBahankajian(){
              axios.get(URL+'api/bahankajian').then(data => {
                  this.bahankajian = data.data;
              });
          },
          createBahankajian(){
            this.form.post(URL+'api/bahankajian');
            $('#addNew').modal('hide')
            this.loadBahankajian();
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
          }
        },
        created() {
            this.loadBahankajian();
        }
    }
</script>
