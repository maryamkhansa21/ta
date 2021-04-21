<template>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Profil Lulusan</h3>

                <div class="card-tools">
                    <button class="btn btn-success" data-bs-toggle="modal" data-target="#addNew">
                    Add New <i class="fas fa-user-plus fa-fw"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Profil Lulusan</th>
                      <th>Deskripsi</th>
                      <th>Modify</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>John Doe</td>
                      <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                      <td>
                          <a href="#">
                              <i class="fa.fa-edit"></i>
                          </a>
                          /
                          <a href="#">
                              <i class="fa.fa-trash"></i>
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
        <div class="modal fade" id="addNew" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="adddNewLabel">Add New</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <div class="form-group">
                <input v-model="form.profillulusan" type="text" name="profillulusan"
                    placeholder="Profil Lulusan"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('profillulusan') }">
                <has-error :form="form" field="profillulusan"></has-error>
                </div>

                 <div class="form-group">
                <input v-model="form.deskripsi" type="text" name="deskripsi"
                    placeholder="Deskripsi"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('deskripsi') }">
                <has-error :form="form" field="deskripsi"></has-error>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Create</button>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                form:new Form({
                    profillulusan :'',
                    deskripsi:''
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
