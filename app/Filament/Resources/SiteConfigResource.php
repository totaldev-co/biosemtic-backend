<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiteConfigResource\Pages;
use App\Models\SiteConfig;
use BackedEnum;
use Filament\Actions\EditAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use UnitEnum;

class SiteConfigResource extends Resource
{
    protected static ?string $model = SiteConfig::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static string|UnitEnum|null $navigationGroup = 'Configuración General';

    protected static ?string $navigationLabel = 'Configuración del Sitio';

    protected static ?string $modelLabel = 'Configuración del Sitio';

    protected static ?string $pluralModelLabel = 'Configuración del Sitio';

    protected static ?int $navigationSort = 100;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Header')
                    ->description('Logo y elementos del encabezado del sitio')
                    ->icon('heroicon-o-window')
                    ->columns(1)
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        FileUpload::make('logo_header')
                            ->label('Logo del Header')
                            ->image()
                            ->disk('public')
                            ->directory('site')
                            ->visibility('public')
                            ->imagePreviewHeight('80')
                            ->maxSize(2048)
                            ->helperText('Logo que aparece en la barra de navegación superior. Recomendado: PNG transparente'),
                    ]),

                Section::make('Footer')
                    ->description('Logo, descripción y títulos del pie de página')
                    ->icon('heroicon-o-bars-3-bottom-left')
                    ->columns(1)
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        FileUpload::make('logo_footer')
                            ->label('Logo del Footer')
                            ->image()
                            ->disk('public')
                            ->directory('site')
                            ->visibility('public')
                            ->imagePreviewHeight('80')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/*', 'image/svg+xml'])
                            ->helperText('Logo para el pie de página. Puede ser SVG'),

                        Textarea::make('footer_description')
                            ->label('Descripción')
                            ->rows(2)
                            ->maxLength(255)
                            ->placeholder('Ej: Especialistas en equipos médicos con más de 15 años de experiencia')
                            ->helperText('Texto descriptivo que aparece debajo del logo en el footer'),

                        TextInput::make('footer_services_title')
                            ->label('Título columna Servicios')
                            ->maxLength(100)
                            ->default('Servicios')
                            ->helperText('Título de la columna de servicios en el footer'),

                        TextInput::make('footer_contact_title')
                            ->label('Título columna Contacto')
                            ->maxLength(100)
                            ->default('Contacto')
                            ->helperText('Título de la columna de contacto en el footer'),

                        TextInput::make('copyright_text')
                            ->label('Texto de Copyright')
                            ->maxLength(255)
                            ->placeholder('© 2026 Biosimtec. Todos los derechos reservados.')
                            ->helperText('Texto legal que aparece en la parte inferior del footer'),
                    ]),

                Section::make('Redes Sociales')
                    ->description('URLs e iconos para WhatsApp, Facebook e Instagram')
                    ->icon('heroicon-o-share')
                    ->columns(1)
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Section::make('WhatsApp')
                            ->columns(1)
                            ->collapsible()
                            ->collapsed()
                            ->schema([
                                TextInput::make('whatsapp_url')
                                    ->label('URL de WhatsApp')
                                    ->url()
                                    ->maxLength(500)
                                    ->placeholder('https://api.whatsapp.com/send/?phone=...')
                                    ->helperText('⚠️ Esta URL se utiliza para TODAS las redirecciones de WhatsApp en el sitio: botón flotante, productos, servicios, formularios, etc.'),

                                FileUpload::make('whatsapp_icon')
                                    ->label('Icono del botón flotante')
                                    ->image()
                                    ->disk('public')
                                    ->directory('site')
                                    ->visibility('public')
                                    ->imagePreviewHeight('40')
                                    ->maxSize(512)
                                    ->helperText('Icono que se muestra en el botón flotante de WhatsApp (esquina inferior derecha)'),
                            ]),

                        Section::make('Facebook')
                            ->columns(1)
                            ->collapsible()
                            ->collapsed()
                            ->schema([
                                TextInput::make('facebook_url')
                                    ->label('URL de Facebook')
                                    ->url()
                                    ->maxLength(500)
                                    ->placeholder('https://www.facebook.com/...')
                                    ->helperText('Enlace a la página de Facebook'),

                                FileUpload::make('facebook_icon')
                                    ->label('Icono')
                                    ->image()
                                    ->disk('public')
                                    ->directory('site')
                                    ->visibility('public')
                                    ->imagePreviewHeight('40')
                                    ->maxSize(512),
                            ]),

                        Section::make('Instagram')
                            ->columns(1)
                            ->collapsible()
                            ->collapsed()
                            ->schema([
                                TextInput::make('instagram_url')
                                    ->label('URL de Instagram')
                                    ->url()
                                    ->maxLength(500)
                                    ->placeholder('https://www.instagram.com/...')
                                    ->helperText('Enlace al perfil de Instagram'),

                                FileUpload::make('instagram_icon')
                                    ->label('Icono')
                                    ->image()
                                    ->disk('public')
                                    ->directory('site')
                                    ->visibility('public')
                                    ->imagePreviewHeight('40')
                                    ->maxSize(512),
                            ]),
                    ]),

                Section::make('Política de Privacidad (Formularios de Contacto)')
                    ->description('PDF que se descarga cuando el usuario acepta la política en los formularios de contacto y cotización')
                    ->icon('heroicon-o-shield-check')
                    ->columns(1)
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        FileUpload::make('privacy_policy_pdf')
                            ->label('Archivo PDF')
                            ->disk('public')
                            ->directory('legal')
                            ->visibility('public')
                            ->acceptedFileTypes(['application/pdf'])
                            ->maxSize(10240)
                            ->downloadable()
                            ->openable()
                            ->helperText('Este documento se vincula en el checkbox "Aceptas nuestra política de privacidad" de los formularios de contacto y cotización. Al hacer clic, el usuario puede descargar o visualizar el PDF.'),
                    ]),

                Section::make('Estado de la Configuración')
                    ->description('Activar o desactivar esta configuración')
                    ->icon('heroicon-o-check-circle')
                    ->columns(1)
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Configuración Activa')
                            ->helperText('Solo una configuración puede estar activa a la vez. Si desactivas esta, el sitio podría no funcionar correctamente.')
                            ->default(true),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo_header')
                    ->label('Logo Header')
                    ->disk('public')
                    ->imageHeight(40),

                TextColumn::make('footer_description')
                    ->label('Descripción')
                    ->limit(50),

                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),

                TextColumn::make('updated_at')
                    ->label('Actualizado')
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make()->label('Editar'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiteConfigs::route('/'),
            'create' => Pages\CreateSiteConfig::route('/create'),
            'edit' => Pages\EditSiteConfig::route('/{record}/edit'),
        ];
    }
}
