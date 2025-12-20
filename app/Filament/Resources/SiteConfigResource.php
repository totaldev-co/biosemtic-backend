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
                    ->description('Configuración del encabezado del sitio')
                    ->icon('heroicon-o-window')
                    ->columns(1)
                    ->schema([
                        FileUpload::make('logo_header')
                            ->label('Logo')
                            ->image()
                            ->disk('public')
                            ->directory('site')
                            ->visibility('public')
                            ->imagePreviewHeight('80')
                            ->maxSize(2048)
                            ->helperText('Logo que aparece en el header. Recomendado: PNG transparente'),
                    ]),

                Section::make('Footer')
                    ->description('Configuración del pie de página')
                    ->icon('heroicon-o-document-text')
                    ->columns(1)
                    ->schema([
                        FileUpload::make('logo_footer')
                            ->label('Logo')
                            ->image()
                            ->disk('public')
                            ->directory('site')
                            ->visibility('public')
                            ->imagePreviewHeight('80')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/*', 'image/svg+xml'])
                            ->helperText('Logo para el footer. Puede ser SVG'),

                        Textarea::make('footer_description')
                            ->label('Descripción')
                            ->rows(2)
                            ->maxLength(255)
                            ->placeholder('Ej: Especialistas en equipos médicos con más de 15 años de experiencia'),

                        TextInput::make('footer_services_title')
                            ->label('Título sección Servicios')
                            ->maxLength(100)
                            ->default('Servicios'),

                        TextInput::make('footer_contact_title')
                            ->label('Título sección Contacto')
                            ->maxLength(100)
                            ->default('Contacto'),

                        TextInput::make('copyright_text')
                            ->label('Texto de Copyright')
                            ->maxLength(255)
                            ->placeholder('© 2025 Biosimtec. Todos los derechos reservados.'),
                    ]),

                Section::make('Redes Sociales')
                    ->description('URLs e iconos de redes sociales')
                    ->icon('heroicon-o-share')
                    ->columns(1)
                    ->schema([
                        Section::make('WhatsApp')
                            ->columns(1)
                            ->schema([
                                TextInput::make('whatsapp_url')
                                    ->label('URL')
                                    ->url()
                                    ->maxLength(500)
                                    ->placeholder('https://api.whatsapp.com/send/?phone=...')
                                    ->helperText('⚠️ Esta URL se utiliza para todas las redirecciones de WhatsApp en el sitio (botón flotante, productos, servicios, etc.)'),

                                FileUpload::make('whatsapp_icon')
                                    ->label('Icono')
                                    ->image()
                                    ->disk('public')
                                    ->directory('site')
                                    ->visibility('public')
                                    ->imagePreviewHeight('40')
                                    ->maxSize(512)
                                    ->helperText('Este icono se muestra en el botón flotante de WhatsApp'),
                            ])
                            ->compact(),

                        Section::make('Facebook')
                            ->columns(1)
                            ->schema([
                                TextInput::make('facebook_url')
                                    ->label('URL')
                                    ->url()
                                    ->maxLength(500)
                                    ->placeholder('https://www.facebook.com/...'),

                                FileUpload::make('facebook_icon')
                                    ->label('Icono')
                                    ->image()
                                    ->disk('public')
                                    ->directory('site')
                                    ->visibility('public')
                                    ->imagePreviewHeight('40')
                                    ->maxSize(512),
                            ])
                            ->compact(),

                        Section::make('Instagram')
                            ->columns(1)
                            ->schema([
                                TextInput::make('instagram_url')
                                    ->label('URL')
                                    ->url()
                                    ->maxLength(500)
                                    ->placeholder('https://www.instagram.com/...'),

                                FileUpload::make('instagram_icon')
                                    ->label('Icono')
                                    ->image()
                                    ->disk('public')
                                    ->directory('site')
                                    ->visibility('public')
                                    ->imagePreviewHeight('40')
                                    ->maxSize(512),
                            ])
                            ->compact(),
                    ])
                    ->collapsible(),

                Section::make('Estado')
                    ->icon('heroicon-o-check-circle')
                    ->columns(1)
                    ->schema([
                        Toggle::make('is_active')
                            ->label('Configuración Activa')
                            ->helperText('Solo una configuración puede estar activa a la vez')
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
