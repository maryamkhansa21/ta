<template>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Mata Kuliah</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                  <thead>
                    <tr>
                      <th>Mata Kuliah</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="k in matkul" :key="k.id">
                      <td >{{k.matkul}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
</template>

<script>
    const URL = "http://localhost:8000/";
    export default {
        data () {
            return {
                kajian : [],
                matkul : [],
                  form:new Form({
                    matkul_id:''
                }),
            }
        },
       methods:{
      
         loadMatkul(){
              axios.get(URL+'api/matkul').then(data => {
                  this.matkul = data.data;
                  console.log(data);
              });
         },
          loadKajian(){
              axios.get(URL+'api/matkul').then(data => {
                  this.kajian = data.data;
           
              });
          },
          createMatkul(){
            this.form.post(URL+'api/matkul');
            $('#addNew')
            Swal.fire({
                icon: 'success',
                title: 'Your work has been saved',
                showConfirmButton: false,
                timer: 1500
              })
          },
        createKajian(){
            this.form.post(URL+'api/kajian');
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
            this.loadMatkul();
            this.loadKajian();
        }
    }
</script>
