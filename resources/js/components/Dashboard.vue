<template>
    <div class="content-wrapper" style="min-height: 45px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Data</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" id="#addNew">
      <div class="row">
        <div class="col-md-6">
             <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Data</h3>
              <div class="card-tools">
              </div>
            </div>
            
            <div class="card-body">
              <div class="form-group">
                <input for="form.programstudi" type="text" name="programstudi" v-model="form.programstudi"
                    placeholder="Program Studi"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('programstudi') }">
                <has-error :form="form" field="programstudi"></has-error>
                </div>

              <div class="form-group">
                <input for="form.jenjang" type="text" name="jenjang"
                    placeholder="Jenjang"
                    class="form-control" :class="{ 'is-invalid': form.errors.has('jenjang') }" v-model="form.jenjang">
                <has-error :form="form" field="jenjang"></has-error>
                </div>
            </div>
            <!-- /.card-body -->
          </div>
            <!-- /.card-body -->
          <!-- /.card -->
        </div>
        <div class="col-md-6">
         
          <!-- /.card -->
        </div>
      </div>
      <form @submit.prevent="createDashboard">
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Tambah" class="btn btn-success float-right">
        </div>
      </div>
      </form>
    </section>
    <!-- /.content -->
  </div>
</template>

<script>
    const URL = "http://localhost:8000/";
    export default {
        data () {
            return {
                dashboard : [],
                form:new Form({
                    programstudi :'',
                    jenjang:''
                })
            }
        },
        methods:{
         loadDashboard(){
              axios.get(URL+'api/dashboard').then(data => {
                  this.dashboard = data.data.data;
              });
          },
          createDashboard(){
            this.form.post(URL+'api/dashboard');
            $('#addNew')
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
          }
        },
        created() {
            this.loadDashboard();
        }
    }
</script>
