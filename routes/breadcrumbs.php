<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Admin Home (Dashboard)
Breadcrumbs::for('admin.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('admin.dashboard'));
});

// Admin Home > Contact
Breadcrumbs::for('admin.contact.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Contact', route('admin.contact.index'));
});

// Admin Home > Configuration
Breadcrumbs::for('admin.configuration.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Configuration', route('admin.configuration.index'));
});

// Admin Home > Configuration > Create
Breadcrumbs::for('admin.configuration.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.configuration.index');
    $trail->push('Create', route('admin.configuration.create'));
});

// Admin Home > Configuration > Edit
Breadcrumbs::for('admin.configuration.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.configuration.index');
    $trail->push('Edit', route('admin.configuration.edit', $id));
});

// Admin Home > Configuration > Show
Breadcrumbs::for('admin.configuration.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.configuration.index');
    $trail->push('Show', route('admin.configuration.show', $id));
});

// Admin Home > Job Categories
Breadcrumbs::for('admin.job-category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Job Categories', route('admin.job-category.index'));
});

// Admin Home > Job Categories > Create
Breadcrumbs::for('admin.job-category.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.job-category.index');
    $trail->push('Create', route('admin.job-category.create'));
});

// Admin Home > Job Categories > Edit
Breadcrumbs::for('admin.job-category.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.job-category.index');
    $trail->push('Edit', route('admin.job-category.edit', $id));
});

// Admin Home > Job Categories > Show
Breadcrumbs::for('admin.job-category.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.job-category.index');
    $trail->push('Show', route('admin.job-category.show', $id));
});

// Admin Home > Religion
Breadcrumbs::for('admin.religion.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Religion', route('admin.religion.index'));
});

// Admin Home > Religion > Create
Breadcrumbs::for('admin.religion.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.religion.index');
    $trail->push('Create', route('admin.religion.create'));
});

// Admin Home > Religion > Edit
Breadcrumbs::for('admin.religion.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.religion.index');
    $trail->push('Edit', route('admin.religion.edit', $id));
});

// Admin Home > Religion > Show
Breadcrumbs::for('admin.religion.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.religion.index');
    $trail->push('Show', route('admin.religion.show', $id));
});

// Admin Home > Users
Breadcrumbs::for('admin.user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Users', route('admin.user.index'));
});

// Admin Home > Benefit
Breadcrumbs::for('admin.benefit.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Benefit', route('admin.benefit.index'));
});

// Admin Home > Benefit
Breadcrumbs::for('admin.benefit.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.benefit.index');
    $trail->push('Benefit', route('admin.benefit.index'));
});

// Admin Home > Benefit
Breadcrumbs::for('admin.benefit.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.benefit.index');
    $trail->push('Benefit', route('admin.benefit.index'));
});


// Admin Home > Users > Create
Breadcrumbs::for('admin.user.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.user.index');
    $trail->push('Create', route('admin.user.create'));
});

// Admin Home > Users > Edit
Breadcrumbs::for('admin.user.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.user.index');
    $trail->push('Edit', route('admin.user.edit', $id));
});

// Admin Home > Users > Show
Breadcrumbs::for('admin.user.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.user.index');
    $trail->push('Show', route('admin.user.show', $id));
});

// Admin Home > Testimoni
Breadcrumbs::for('admin.testimoni.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Testimoni', route('admin.testimoni.index'));
});

// Admin Home > Testimoni > Create
Breadcrumbs::for('admin.testimoni.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.testimoni.index');
    $trail->push('Create', route('admin.testimoni.create'));
});

// Admin Home > Testimoni > Edit
Breadcrumbs::for('admin.testimoni.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.testimoni.index');
    $trail->push('Edit', route('admin.testimoni.edit', $id));
});

// Admin Home > Testimoni > Show
Breadcrumbs::for('admin.testimoni.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.testimoni.index');
    $trail->push('Show', route('admin.testimoni.show', $id));
});


// Admin Home > order
Breadcrumbs::for('admin.order.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Order', route('admin.order.index'));
});

// Admin Home > order > Create
Breadcrumbs::for('admin.order.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.order.index');
    $trail->push('Create', route('admin.order.create'));
});

// Admin Home > order > Edit
Breadcrumbs::for('admin.order.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.order.index');
    $trail->push('Edit', route('admin.order.edit', $id));
});

// Admin Home > order > Show
Breadcrumbs::for('admin.order.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.order.index');
    $trail->push('Show', route('admin.order.show', $id));
});

// Admin Home > List Perusahaan
Breadcrumbs::for('admin.list-perusahaan.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('List Perusahaan', route('admin.list-perusahaan.index'));
});

// Admin Home > List Perusahaan > Create
Breadcrumbs::for('admin.list-perusahaan.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.list-perusahaan.index');
    $trail->push('Create', route('admin.list-perusahaan.create'));
});

// Admin Home > List Perusahaan > Edit
Breadcrumbs::for('admin.list-perusahaan.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.list-perusahaan.index');
    $trail->push('Edit', route('admin.list-perusahaan.edit', $id));
});

// Admin Home > List Perusahaan > Show
Breadcrumbs::for('admin.list-perusahaan.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.list-perusahaan.index');
    $trail->push('Show', route('admin.list-perusahaan.show', $id));
});

// Admin Home > Education Levels
Breadcrumbs::for('admin.educationLevel.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Education Levels', route('admin.educationLevel.index'));
});

// Admin Home > Education Levels > Create
Breadcrumbs::for('admin.educationLevel.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.educationLevel.index');
    $trail->push('Create', route('admin.educationLevel.create'));
});


// Admin Home > Education Levels > Edit
Breadcrumbs::for('admin.educationLevel.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.educationLevel.index');
    $trail->push('Edit', route('admin.educationLevel.edit', $id));
});

// Admin Home > Education Levels > Show
Breadcrumbs::for('admin.educationLevel.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.educationLevel.index');
    $trail->push('Show', route('admin.educationLevel.show', $id));
});

// Admin Home > Requirements
Breadcrumbs::for('admin.requirement.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Requirements', route('admin.requirement.index'));
});

// Admin Home > Requirements > Create
Breadcrumbs::for('admin.requirement.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.requirement.index');
    $trail->push('Create', route('admin.requirement.create'));
});

// Admin Home > Requirements > Edit
Breadcrumbs::for('admin.requirement.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.requirement.index');
    $trail->push('Edit', route('admin.requirement.edit', $id));
});

// Admin Home > Requirements > Show
Breadcrumbs::for('admin.requirement.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.requirement.index');
    $trail->push('Show', route('admin.requirement.show', $id));
});

// Admin Home > Job Time Types
Breadcrumbs::for('admin.jobTimeType.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Job Time Types', route('admin.jobTimeType.index'));
});

// Admin Home > Job Time Types > Create
Breadcrumbs::for('admin.jobTimeType.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.jobTimeType.index');
    $trail->push('Create', route('admin.jobTimeType.create'));
});

// Admin Home > Job Time Types > Edit
Breadcrumbs::for('admin.jobTimeType.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.jobTimeType.index');
    $trail->push('Edit', route('admin.jobTimeType.edit', $id));
});

// Admin Home > Job Time Types > Show
Breadcrumbs::for('admin.jobTimeType.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.jobTimeType.index');
    $trail->push('Show', route('admin.jobTimeType.show', $id));
});

// Admin Home > apply Process
Breadcrumbs::for('admin.applyProcess.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('apply Process', route('admin.applyProcess.index'));
});

// Admin Home > applyProcess > Create
Breadcrumbs::for('admin.applyProcess.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.applyProcess.index');
    $trail->push('Create', route('admin.applyProcess.create'));
});

// Admin Home > applyProcess > Edit
Breadcrumbs::for('admin.applyProcess.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.applyProcess.index');
    $trail->push('Edit', route('admin.applyProcess.edit', $id));
});

// Admin Home > applyProcess > Show
Breadcrumbs::for('admin.applyProcess.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.applyProcess.index');
    $trail->push('Show', route('admin.applyProcess.show', $id));
});


// Admin Home > (Trash Job Category)
Breadcrumbs::for('admin.trashcategory', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Trash Job Category', route('admin.trashcategory'));
});

// Admin Home > Trash orders
Breadcrumbs::for('admin.trashorder', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Trash Order', route('admin.trashorder'));
});


// Admin Home > (Trash Religion)
Breadcrumbs::for('admin.trashreligion', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Trash Religion', route('admin.trashreligion'));
});

// Admin Home > Trash Users
Breadcrumbs::for('admin.trashuser', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Trash User', route('admin.trashuser'));
});

// Admin Home > Trash Apply Process
Breadcrumbs::for('admin.applyprocess', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Trash Apply Process', route('admin.applyprocess'));
});


// Admin Home > Trash Contact
Breadcrumbs::for('admin.trashcontact', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Trash Contact', route('admin.trashcontact'));
});


// Admin Home > Trash Education Level
Breadcrumbs::for('admin.educationlevel', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Trash Education Level', route('admin.educationlevel'));
});

Breadcrumbs::for('admin.jobsekeer', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Data Job Seeker', route('admin.jobsekeer'));
});

// Admin Home > Trash Job Time Type
Breadcrumbs::for('admin.jobtyme', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Trash Job Time Type', route('admin.jobtyme'));
});

// Admin Home > Trash List Perusahaan
Breadcrumbs::for('admin.trashcompany', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Trash Company', route('admin.trashcompany'));
});


// Admin Home > Trash Job Seeker
Breadcrumbs::for('admin.trashjobseeker', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Trash Job Seeker', route('admin.trashjobseeker'));
});



// Admin Home > Trash Job Categories > Restore
Breadcrumbs::for('admin.restore-job-category', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.trash-job-category.index');
    $trail->push('Restore', route('admin.restore-job-category', $id));
});

// Admin Home > Trash Religions > Restore
Breadcrumbs::for('admin.restore-religion', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.trash-religion.index');
    $trail->push('Restore', route('admin.restore-religion', $id));
});

// Admin Home > Trash Users > Restore
Breadcrumbs::for('admin.restore-user', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.trash-user.index');
    $trail->push('Restore', route('admin.restore-user', $id));
});



// Admin Home > Trash Job Categories > Delete
Breadcrumbs::for('admin.delete-job-category', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.trash-job-category.index');
    $trail->push('Delete', route('admin.delete-job-category', $id));
});

// Admin Home > Trash Religions > Delete
Breadcrumbs::for('admin.delete-religion', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.trash-religion.index');
    $trail->push('Delete', route('admin.delete-religion', $id));
});

// Admin Home > Trash Users > Delete
Breadcrumbs::for('admin.delete-user', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('admin.trash-user.index');
    $trail->push('Delete', route('admin.delete-user', $id));
});


//COMPANY BREADCRUMB

// Company Home (Dashboard)
Breadcrumbs::for('companie.dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('companie.dashboard'));
});

// Company Home > Company Profile
Breadcrumbs::for('companie.company-profile.index', function (BreadcrumbTrail $trail) {
    $trail->parent('companie.dashboard');
    $trail->push('Company Profile', route('companie.company-profile.index'));
});

// Company Home > Company Profile > Create
Breadcrumbs::for('companie.company-profile.create', function (BreadcrumbTrail $trail) {
    $trail->parent('companie.company-profile.index');
    $trail->push('Create', route('companie.company-profile.create'));
});

// Company Home > Company Profile > Edit
Breadcrumbs::for('companie.company-profile.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('companie.company-profile.index');
    $trail->push('Edit', route('companie.company-profile.edit', $id));
});

// Company Home > Company Profile > Show
Breadcrumbs::for('companie.company-profile.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('companie.company-profile.index');
    $trail->push('Show', route('companie.company-profile.show', $id));
});

// Company Home > Lowongan Kerja
Breadcrumbs::for('companie.lowongan-kerja.index', function (BreadcrumbTrail $trail) {
    $trail->parent('companie.dashboard');
    $trail->push('Lowongan Kerja', route('companie.lowongan-kerja.index'));
});

// Company Home > Lowongan Kerja > Create
Breadcrumbs::for('companie.lowongan-kerja.set_publish', function (BreadcrumbTrail $trail, $job) {
    // Menyatakan breadcrumb induk
    $trail->parent('companie.lowongan-kerja.index');

    // Menambahkan breadcrumb untuk detail kandidat
    $trail->push('Pilih Paket Publish', route('companie.lowongan-kerja.set_publish', $job));
});

Breadcrumbs::for('companie.lowongan-kerja.invoice', function (BreadcrumbTrail $trail, $job) {
    // Menyatakan breadcrumb induk
    $trail->parent('companie.lowongan-kerja.index');

    // Menambahkan breadcrumb untuk detail kandidat
    $trail->push('Invoice Pembayaran', route('companie.lowongan-kerja.invoice', $job));
});

Breadcrumbs::for('companie.lowongan-kerja.showInvoice', function (BreadcrumbTrail $trail, $job) {
    // Menyatakan breadcrumb induk
    $trail->parent('companie.lowongan-kerja.index');

    // Menambahkan breadcrumb untuk detail kandidat
    $trail->push('Invoice Pembayaran', route('companie.lowongan-kerja.showInvoice', $job));
});
Breadcrumbs::for('companie.lowongan-kerja.create', function (BreadcrumbTrail $trail) {
    $trail->parent('companie.lowongan-kerja.index');
    $trail->push('Create', route('companie.lowongan-kerja.create'));
});

// Company Home > Lowongan Kerja > Edit
Breadcrumbs::for('companie.lowongan-kerja.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('companie.lowongan-kerja.index');
    $trail->push('Edit', route('companie.lowongan-kerja.edit', $id));
});

// Company Home > Lowongan Kerja > Show
Breadcrumbs::for('companie.lowongan-kerja.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('companie.lowongan-kerja.index');
    $trail->push('Show', route('companie.lowongan-kerja.show', $id));
});

Breadcrumbs::for('companie.lowongan-kerja.detail_candidate', function (BreadcrumbTrail $trail, $job_seeker_id) {
    // Menyatakan breadcrumb induk
    $trail->parent('companie.lowongan-kerja.index');

    // Menambahkan breadcrumb untuk detail kandidat
    $trail->push('Detail Candidate', route('companie.lowongan-kerja.detail_candidate', $job_seeker_id));
});

Breadcrumbs::for('companie.lowongan-kerja.set_interview', function (BreadcrumbTrail $trail, $jobhistori) {
    // Menyatakan breadcrumb induk
    $trail->parent('companie.lowongan-kerja.index');

    // Menambahkan breadcrumb untuk detail kandidat
    $trail->push('Detail Candidate', route('companie.lowongan-kerja.set_interview', $jobhistori));
});

//TRASH DATA COMPANY

// Company Home > Trash Lowongan Pekerjaan
Breadcrumbs::for('companie.trashjob', function (BreadcrumbTrail $trail) {
    $trail->parent('companie.dashboard');
    $trail->push('Trash Lowongan Pekerjaan', route('companie.trashjob'));
});

// Company Home > Trash Benefit
Breadcrumbs::for('companie.trashbenefit', function (BreadcrumbTrail $trail) {
    $trail->parent('companie.dashboard');
    $trail->push('Trash Benefit', route('companie.trashbenefit'));
});
// Admin Home > Requirements
Breadcrumbs::for('companie.requirement.index', function (BreadcrumbTrail $trail) {
    $trail->parent('companie.dashboard');
    $trail->push('Requirements', route('admin.requirement.index'));
});

// Admin Home > Requirements > Create
Breadcrumbs::for('companie.requirement.create', function (BreadcrumbTrail $trail) {
    $trail->parent('companie.requirement.index');
    $trail->push('Create', route('companie.requirement.create'));
});

// Admin Home > Requirements > Edit
Breadcrumbs::for('companie.requirement.edit', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('companie.requirement.index');
    $trail->push('Edit', route('admin.requirement.edit', $id));
});

// Admin Home > Requirements > Show
Breadcrumbs::for('companie.requirement.show', function (BreadcrumbTrail $trail, $id) {
    $trail->parent('companie.requirement.index');
    $trail->push('Show', route('companie.requirement.show', $id));
});

// Admin Home > Benefit
Breadcrumbs::for('companie.benefit.index', function (BreadcrumbTrail $trail) {
    $trail->parent('companie.dashboard');
    $trail->push('Benefit', route('companie.benefit.index'));
});

// Admin Home > Benefit
Breadcrumbs::for('companie.benefit.create', function (BreadcrumbTrail $trail) {
    $trail->parent('companie.benefit.index');
    $trail->push('Benefit', route('companie.benefit.index'));
});

// Admin Home > Benefit
Breadcrumbs::for('companie.benefit.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('companie.benefit.index');
    $trail->push('Benefit', route('companie.benefit.index'));
});