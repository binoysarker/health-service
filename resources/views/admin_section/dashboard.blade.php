@extends('front_end.layouts.admin_master')
@section('title')
  Admin Panel | Home
@endsection
@section('main_content')
  {{-- notification section start --}}
  <div class="columns">
    <div class="column">
      <div class="box">
        <div class="notification">
          <button class="delete"></button>
          Lorem ipsum dolor sit amet, consectetur

        </div>
      </div>
    </div>
    <div class="column">
      <div class="box">
        <div class="notification">
          <button class="delete"></button>
          Lorem ipsum dolor sit amet, consectetur

        </div>
      </div>
    </div>
    <div class="column">
      <div class="box">
        <div class="notification">
          <button class="delete"></button>
          Lorem ipsum dolor sit amet, consectetur

        </div>
      </div>
    </div>
  </div>
  {{-- notification section end --}}
  {{-- table section start --}}
  <section class="section">
    <div class="columns">
      <div class="column">
        <table class="table is-striped is-hoverable">
          <thead>
            <tr>
              <th>heading 1</th>
              <th>heading 2</th>
              <th>heading 3</th>
              <th>heading 4</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>item 1</td>
              <td>item 2</td>
              <td>item 3</td>
              <td>item 4</td>
            </tr>
            <tr>
              <td>item 1</td>
              <td>item 2</td>
              <td>item 3</td>
              <td>item 4</td>
            </tr>
            <tr>
              <td>item 1</td>
              <td>item 2</td>
              <td>item 3</td>
              <td>item 4</td>
            </tr>
            <tr>
              <td>item 1</td>
              <td>item 2</td>
              <td>item 3</td>
              <td>item 4</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </section>
  {{-- table section end --}}
@endsection
