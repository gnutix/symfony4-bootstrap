# My Project

## Installation

### Fetch the code of the project:

1. Clone this repository
2. `git submodule update --init`

### Installation

1. Setup [Drifter's requirements](https://liip-drifter.readthedocs.io/en/stable/requirements.html)
2. `vagrant plugin install vagrant-hostmanager`
3. `vagrant up --provider=lxc` (if you have LXC, which is faster and recommended) or `vagrant up --provider=virtualbox`
   (if you only have VirtualBox)

#### Global .gitignore

If it does not exist already, create a `~/.gitignore` file, append `.vagrant/` (and any IDE-related folders) to it and
instruct git to use it globally `git config --global core.excludesfile ~/.gitignore`.

### Access the application

Open [my-project.lo](http://my-project.lo/) in your web browser.

### Development tools

First, connect to the vagrant box: `vagrant ssh`.

To execute the quality control tools (automated testing, coding standards, syntax validation, configuration validation), 
run `bin/quality_control`.

To execute the static analysis tools, run `bin/static_code_analysis`. 

To clear the cache (if you ever need to), run `bin/cache_clear` (it uses the correct options, as of Symfony 3.3, for
the cache:clear and cache:warmup commands).
