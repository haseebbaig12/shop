@extends('backend/layouts/master')
@section('title')
  Cooutfits - Dashboard
@endsection
@section('content')
    <div class="row">
      <div class="col-xl-4 col-lg-12">
        <div class="card card-chart">
          <div class="card-header card-header-success">
            <div class="ct-chart" id="dailySalesChart"></div>
          </div>
          <div class="card-body">
            <h4 class="card-title">Daily Sales</h4>
            <p class="card-category">
              <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
          </div>
          <div class="card-footer">
            <div class="stats">
              <i class="material-icons">access_time</i> updated 4 minutes ago
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6 col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Employees Stats</h4>
            <p class="card-category">New employees on 15th September, 2016</p>
          </div>
          <div class="card-body table-responsive">
            <table class="table table-hover">
              <thead class="text-warning">
                <th>ID</th>
                <th>Name</th>
                <th>Salary</th>
                <th>Country</th>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Dakota Rice</td>
                  <td>$36,738</td>
                  <td>Niger</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Minerva Hooper</td>
                  <td>$23,789</td>
                  <td>Curaçao</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Sage Rodriguez</td>
                  <td>$56,142</td>
                  <td>Netherlands</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Philip Chaney</td>
                  <td>$38,735</td>
                  <td>Korea, South</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection