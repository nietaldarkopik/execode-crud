<div class="row">
    <div class="col-sm-12 p-1">
		<label class="custom-file mb-0" for="input-file">Photo</label>
        @if (!empty($member->photo))
            <img src="{{ asset(Storage::url($member->photo)) }}" class="img img-thumbnail" />
        @endif
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="nama">Nama</label>
            <div class="form-text col-md-9">{{ $member->nama }}</div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="id_member_type">Jenis Member</label>
            <div class="form-text col-md-9">
                @foreach (Modules\Member\App\Models\MemberTypeModel::all() as $i => $memberType)
                    @if ($memberType->id == $member->id_member_type)
                        {{ $memberType->title }}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
	
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="tempat_lahir">Tempat Lahir</label>
            <div class="form-text col-md-9">{{ $member->tempat_lahir }}</div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="tanggal_lahir">Tanggal Lahir</label>
            <div class="form-text col-md-9">{{ $member->tanggal_lahir }}</div>
        </div>
    </div>
	
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="alamat">Alamat</label>
            <div class="form-text col-md-9">{{ $member->alamat }}</div>
        </div>
    </div>
	
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="id_geup">Geup</label>
            <div class="form-text col-md-9">
                @foreach (Modules\Member\App\Models\GeupModel::all() as $i => $geup)
                    @if ($geup->id == $member->id_geup)
                        {{ $geup->title }}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="no_reg">No Reg</label>
            <div class="form-text col-md-9">{{ $member->no_reg }}</div>
        </div>
    </div>
	
    <div class="col-xs-12 col-sm-12 ">
        <div class="row border-bottom border-1">
            <label class="mb-0 col-md-3" for="id_user">User</label>
            <div class="form-text col-md-9">
                @foreach (App\Models\User::all() as $i => $user)
                    @if ($user->id == $member->id_user)
                        {{ $user->name }}
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
