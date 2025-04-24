{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Photos" icon="la la-camera" :link="backpack_url('photo')" />
<x-backpack::menu-item title="Tags" icon="la la-tag" :link="backpack_url('tag')" />