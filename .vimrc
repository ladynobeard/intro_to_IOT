
colorscheme badwolf
" set background=dark
au BufNewFile,BufRead *.ejs set filetype=html

" Tabs
set tabstop=2
set softtabstop=2
set shiftwidth=2
set expandtab
set autoindent
set smartindent

syntax enable
syntax on
" set columns=83

set number " show line number
set showmatch " match parentheses and braces

" Searching
set incsearch " search as character are entered
set hlsearch " highlight matches

" Move backups (swp files) to /tmp folder
set backup
set backupdir=~/.vim-tmp,~/.tmp,~/tmp,/var/tmp,/tmp
set backupskip=/tmp/*,/private/tmp/*
set directory=~/.vim-tmp,~/.tmp,~/tmp,/var/tmp,/tmp
set writebackup
