
@extends('layouts.admin')

@section('content')
    <div class="container">
        <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
        <div class="mail-box">
            <aside class="sm-side">
                <div class="user-head">
                    <div class="user-name"> 
                        @foreach($user as $data)
                            <div class="user_data">
                                <span>{{$data->name}}</span>
                                <span>{{$data->lastname}}</span>
                            </div>
                            <span>{{$data->email}}</span>
                        @endforeach
                    </div>
                </div>

                <ul class="inbox-nav inbox-divider">
                    <li class="active">
                        <a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a>

                    </li>

                    <li>
                        <a href="#"><i class="fa fa-bookmark-o"></i> Important</a>
                    </li>
                    <li>
                        <a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a>
                    </li>
                    <li>
                        <a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
                    </li>
                </ul>
            </aside>

            <aside class="lg-side">
                <div class="inbox-head">
                    <h3>Inbox</h3>
                    <form action="#" class="pull-right position">
                        <div class="input-append">
                            <input type="text" class="sr-input" placeholder="Search Mail">
                            <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="inbox-body">
                    <div class="mail-option">
                        <div class="chk-all">
                            <input type="checkbox" class="mail-checkbox mail-group-checkbox">
                            <div class="btn-group">
                                <a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
                                    All
                                    <i class="fa fa-angle-down "></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#"> None</a></li>
                                    <li><a href="#"> Read</a></li>
                                    <li><a href="#"> Unread</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="btn-group">
                            <a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
                                <i class=" fa fa-refresh"></i>
                            </a>
                        </div>
                        <div class="btn-group hidden-phone">
                            <a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
                                More
                                <i class="fa fa-angle-down "></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a data-toggle="dropdown" href="#" class="btn mini blue">
                                Move to
                                <i class="fa fa-angle-down "></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
                                <li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                            </ul>
                        </div>

                        <ul class="unstyled inbox-pagination">
                            <li>
                                <a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
                            </li>
                            <li>
                                <a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
                            </li>
                        </ul>
                    </div>
                    <table class="table table-inbox table-hover">
                    <tbody>
                        @foreach ($messages as $message)
                            <tr class="unread">
                                <td class="inbox-small-cells">
                                    <input type="checkbox" class="mail-checkbox">
                                </td>
                                <td class="inbox-small-cells"><i class="fa fa-star"></i></td>
                                <td class="view-message  dont-show">{{$message->email}}</td>
                                <td class="view-message ">{{$message->body}}</td>
                                <td class="view-message  inbox-small-cells"><i class="fa fa-paperclip"></i></td>
                                <td class="view-message  text-right">{{$message->created_at}}</td>
                            </tr>
                            
                        @endforeach
                    </table>
                </div>
            </aside>
        </div>
    </div>
@endsection
