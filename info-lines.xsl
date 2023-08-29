<?xml version="1.0"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
	<xsl:template match="anti">
		<xsl:variable name="src_logo" select="icon" />
		
		<div style="background-color: teal; color: white; padding: 4px;">
			<span style="font-weight: bold;">
				<img src="{$src_logo}" alt="logo image" width="50mm" style="padding-right: 10px;"/>
				<span style="height: 45px; display: table-cell;vertical-align: middle;">
					<xsl:value-of select="name"/>
				</span>
			</span>
		</div>
		<div style="margin-left: 20px; margin-bottom: 1em; font-size: 10pt">
			<p>
				Лицензия - <xsl:value-of select="license"/>. Сканирование по запросу - <xsl:value-of select="scan" /> <br/>
				Постоянная защита - <xsl:value-of select="permanent" />. Email защита - <xsl:value-of select="email" /> <br/>
				Веб-защита - <xsl:value-of select="web" />
			</p>
		</div>
	</xsl:template>
</xsl:stylesheet>
