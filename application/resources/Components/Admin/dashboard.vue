<template>
  <div class="row">
    <div class="col-xl-6 col-md-6">
      <div class="row">
        <div class="col">
          <div class="card card-shadow mb-3 -pt-3">
            <div class="card-body">
              <div class="row">
                <div class=" col-md-6">
                  <div class="media d-flex align-items-center  mb-2">
                    <div class="mr-4 rounded-circle bg-warning sr-icon-box ">
                      <i class="vl_user-male"></i>
                    </div>
                    <div class="media-body">
                      <h4 class="text-uppercase mb-0 weight500">{{ this.customers }}</h4>
                      <span class="text-muted">Customers</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6 col-md-5">
      <div class="card text-light mb-4 bg-gradient- blog-wrap blog-gradient-overlay">
        <!--<div class=""></div>-->
        <div class="card-header border-0">
          <div class="position-relative">
            <div class=" widget-action-link">
            </div>
          </div>
        </div>
        <div class="card-body d-flex align-items-end" style="min-height: 378px">
          <div class="widget-post">
            <div class="cat">
              <a href="#">Customer Maintenance System</a>
            </div>
            <h2><a href="#">Welcome to CMS </a></h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import axios from 'axios';

export default {
  name: "dashboard",

  data() {

      return {
        customers: 0
      }
  },

  mounted() {
    this.fetchCustomers();
  },

  methods : {
    fetchCustomers() {

      axios.get('actions.php?analytics')
          .then(response => {
            console.log(response);
            this.customers = response.data.customers;
          })
          .catch(error => console.log(error));
    },
  }
}
</script>

<style scoped>

</style>