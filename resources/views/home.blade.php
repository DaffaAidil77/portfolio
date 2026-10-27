@extends('layouts.portfolio')

@section('content')
<!-- Hero -->
<section id="hero" class="hero section dark-background">
    <img src="{{ asset('assets-portfolio/img/hero-bg.jpg') }}" alt="" data-aos="fade-in">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <h2>{{ $profile->name }}</h2>
        <p>I'm <span class="typed" data-typed-items="Photographer, KADEP, Mahasiswa Teknik Informatika">Photographer</span><span class="typed-cursor typed-cursor--blink" aria-hidden="true"></span></p>
    </div>
</section>

<!-- About -->
<section id="about" class="about section">
    <div class="container section-title" data-aos="fade-up">
        <h2>About</h2>
        <p>{{ $profile->intro }}</p>
    </div>
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center mb-4">
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editProfile">Edit About</button>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-lg-4">
                <img src="{{ $profile->photo ? asset('assets-portfolio/img/' . $profile->photo) : asset('assets-portfolio/img/my-profile-img.jpg') }}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 content">
                <h2>{{ $profile->headline }}</h2>
                <p class="fst-italic py-3">{{ $profile->bio }}</p>
                <div class="row">
                    <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>Kampus:</strong> <span>{{ $profile->campus }}</span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Prodi:</strong> <span>{{ $profile->study_program }}</span></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>Organisasi:</strong> <span>{{ $profile->organization }}</span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $profile->email }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Edit About --}}
    <div class="modal fade" id="editProfile" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('profiles.update', $profile) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit About</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control mb-2" name="name" value="{{ $profile->name }}" placeholder="Nama" required>
                        <label class="small">Ganti foto profil (kosongkan kalau tidak diganti)</label>
                        <input class="form-control mb-2" type="file" name="photo" accept="image/*">
                        <input class="form-control mb-2" name="intro" value="{{ $profile->intro }}" placeholder="Perkenalan singkat">
                        <input class="form-control mb-2" name="headline" value="{{ $profile->headline }}" placeholder="Headline">
                        <textarea class="form-control mb-2" name="bio" placeholder="Bio">{{ $profile->bio }}</textarea>
                        <input class="form-control mb-2" name="campus" value="{{ $profile->campus }}" placeholder="Kampus">
                        <input class="form-control mb-2" name="study_program" value="{{ $profile->study_program }}" placeholder="Prodi">
                        <input class="form-control mb-2" name="organization" value="{{ $profile->organization }}" placeholder="Organisasi">
                        <input class="form-control mb-2" name="email" value="{{ $profile->email }}" placeholder="Email">
                    </div>
                    <div class="modal-footer"><button class="btn btn-warning">Update</button></div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Resume -->
<section id="resume" class="resume section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Resume</h2>
    </div>

    <div class="container">
        <div class="text-center mb-4">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahExp">+ Tambah Resume</button>
        </div>

        <div class="row">
            @foreach(['Education', 'Organization'] as $type)
            <div class="col-lg-6" data-aos="fade-up">
                <h3 class="resume-title">{{ $type }}</h3>
                @forelse(($experiences ?? collect())->where('type', $type) as $exp)
                <div class="resume-item">
                    <h4>{{ $exp->title }}</h4>
                    <h5>{{ $exp->period }}</h5>
                    <p><em>{{ $exp->place }}</em></p>
                    <p>{{ $exp->description }}</p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editExp{{ $exp->id }}">Edit</button>
                        <form action="{{ route('experiences.destroy', $exp) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
                @empty
                <p>Belum ada data.</p>
                @endforelse
            </div>
            @endforeach
        </div>
    </div>

    {{-- Modal Tambah Resume --}}
    <div class="modal fade" id="modalTambahExp" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('experiences.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Resume</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <select class="form-select mb-2" name="type" required>
                            <option value="Education">Education</option>
                            <option value="Organization">Organization</option>
                        </select>
                        <input class="form-control mb-2" name="title" placeholder="Judul / Jabatan" required>
                        <input class="form-control mb-2" name="period" placeholder="Periode (mis. 2024 - Sekarang)">
                        <input class="form-control mb-2" name="place" placeholder="Tempat / Organisasi">
                        <textarea class="form-control" name="description" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="modal-footer"><button class="btn btn-primary">Simpan</button></div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit Resume --}}
    @foreach($experiences ?? [] as $exp)
    <div class="modal fade" id="editExp{{ $exp->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('experiences.update', $exp) }}" method="POST">
                    @csrf @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Resume</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <select class="form-select mb-2" name="type" required>
                            <option value="Education" @selected($exp->type == 'Education')>Education</option>
                            <option value="Organization" @selected($exp->type == 'Organization')>Organization</option>
                        </select>
                        <input class="form-control mb-2" name="title" value="{{ $exp->title }}" required>
                        <input class="form-control mb-2" name="period" value="{{ $exp->period }}">
                        <input class="form-control mb-2" name="place" value="{{ $exp->place }}">
                        <textarea class="form-control" name="description">{{ $exp->description }}</textarea>
                    </div>
                    <div class="modal-footer"><button class="btn btn-warning">Update</button></div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</section>

<!-- Portfolio (dari database) -->
<section id="portfolio" class="portfolio section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>Karya fotografi dan proyek.</p>
    </div>

    <div class="text-center mb-4">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahWork">+ Tambah Karya</button>
    </div>

    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                @foreach(collect($works ?? [])->pluck('category')->unique() as $cat)
                <li data-filter=".filter-{{ Str::slug($cat) }}">{{ $cat }}</li>
                @endforeach
            </ul>

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                @forelse($works ?? [] as $work)
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-{{ Str::slug($work->category) }}">
                    <div class="portfolio-content h-100">
                        <img src="{{ asset('assets-portfolio/img/portfolio/' . $work->image) }}" class="img-fluid" alt="{{ $work->title }}">
                        <div class="portfolio-info">
                            <h4>{{ $work->title }}</h4>
                            <p>{{ $work->description }}</p>
                            <a href="{{ asset('assets-portfolio/img/portfolio/' . $work->image) }}" title="{{ $work->title }}" data-gallery="portfolio-gallery" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                        </div>
                    </div>
                    <div class="mt-2 d-flex gap-2">
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editWork{{ $work->id }}">Edit</button>
                        <form action="{{ route('works.destroy', $work) }}" method="POST" onsubmit="return confirm('Hapus karya ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="text-center">Belum ada karya.</p>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Modal Tambah Karya --}}
    <div class="modal fade" id="modalTambahWork" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('works.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Karya</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control mb-2" name="title" placeholder="Judul" required>
                        <input class="form-control mb-2" name="category" placeholder="Kategori (mis. Photography)" required>
                        <input class="form-control mb-2" type="file" name="image" accept="image/*" required>
                        <input class="form-control mb-2" name="year" type="number" placeholder="Tahun">
                        <textarea class="form-control" name="description" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="modal-footer"><button class="btn btn-primary">Simpan</button></div>
                </form>
            </div>
        </div>
    </div>

    {{-- Modal Edit Karya --}}
    @foreach($works ?? [] as $work)
    <div class="modal fade" id="editWork{{ $work->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('works.update', $work) }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Karya</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control mb-2" name="title" value="{{ $work->title }}" required>
                        <input class="form-control mb-2" name="category" value="{{ $work->category }}" required>
                        <label class="small">Ganti foto (kosongkan kalau tidak diganti)</label>
                        <input class="form-control mb-2" type="file" name="image" accept="image/*">
                        <input class="form-control mb-2" name="year" type="number" value="{{ $work->year }}">
                        <textarea class="form-control" name="description">{{ $work->description }}</textarea>
                    </div>
                    <div class="modal-footer"><button class="btn btn-warning">Update</button></div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</section>
@endsection