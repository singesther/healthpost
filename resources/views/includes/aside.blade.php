
        <div class="wrapper">
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Admin</h3>
            <hr>
        </div>
        <ul class="list-unstyled components">
            <p>MENUS</p>
            <li> <a href="#owners" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Owners</a>
                <ul class="collapse list-unstyled" id="owners">
                    <li> <a href="{{ route('member.index') }}">Owners</a> </li>
                    <li> <a href="{{ route('member.create') }}">Add new</a> </li>

                </ul>
            </li>
            <li> <a href="#healthcenter" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Healthcenters</a>
                <ul class="collapse list-unstyled" id="healthcenter">
                    <li> <a href="{{ route('health.index') }}">Healthcenters</a> </li>
                    <li> <a href="{{( route('health.create'))}}">Add new</a> </li>

                </ul>
            </li>

            <li> <a href="#healthpost" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Healthposts</a>
                <ul class="collapse list-unstyled" id="healthpost">
                    <li> <a href="{{ route('healthpost.index') }}">Healthposts</a> </li>
                    <li> <a href="{{( route('healthpost.create'))}}">Add new</a> </li>

                </ul>
            </li>
            <li> <a href="#membership" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Memberships</a>
                <ul class="collapse list-unstyled" id="membership">
                    <li> <a href="{{ route('membership.index') }}">Memberships</a> </li>
                    <li> <a href="{{( route('membership.create'))}}">Add new</a> </li>

                </ul>
            </li>
            <li> <a href="#installments" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Installments</a>
                <ul class="collapse list-unstyled" id="installments">
                    <li> <a href="{{ route('installments.index') }}">Installments</a> </li>
                    <li> <a href="{{( route('installments.create'))}}">Add new</a> </li>


                </ul>
            </li>



        </ul>
        <ul class="list-unstyled CTAs">
            <li> <a href="{{ route('signout') }}" class="download">Logout</a> </li>
        </ul>
    </nav>
