@extends('poscloud::layouts.master')

@section('floorPlan')
  @include('poscloud::pos.floor')
@endsection

@section('orders')
  @include('poscloud::pos.orders')
@endsection


@section('orderDetails')
  @include('poscloud::pos.order')
@endsection




