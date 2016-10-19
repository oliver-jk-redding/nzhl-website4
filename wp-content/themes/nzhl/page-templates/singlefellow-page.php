<?php
/**
 * Template Name: Singlefellow page
 *
 * This template display content at full with, with no sidebars.
 * Please note that this is the WordPress construct of pages and that other 'pages' on your WordPress site will use a different template.
 *
 * @package some_like_it_neat
 */

get_header(); ?>

<div id="primary" class="content-area">

	<div class="fac-single">
		<h1><?php the_title(); ?></h1>

		<?php the_content(); ?>



		<ul class="fac-accordion">
			<li>
				<a class="fac-toggle" href="javascript:void(0);"><h2>Publications</h2></a>
				<div class="fac-inner">

					<?php if (get_field('publications')) : ?>

						<ul class="tabs">
							<?php 
							$i = 0;
							while ( have_rows('publications') ) : the_row();
							$date = get_sub_field('dates'); 
							?>
							<li class="tab-link" data-tab="tab-<?php echo $i; ?>"><?php echo $date; ?></li>
							<?
							$i++;
							endwhile; ?>
						</ul>


						<?php 
						$i = 0;
						while ( have_rows('publications') ) : the_row();
						$content = get_sub_field('content'); 
						?>
						<div id="tab-<?php echo $i; ?>" class="tab-content">
							<?php echo $content; ?>
						</div>
						<?
						$i++;
						endwhile; ?>

					<?php endif; ?>

				</div>
			</li>




			<li>
				<a class="fac-toggle" href="javascript:void(0);"><h2>Books</h2></a>
				<div class="fac-inner">
			      <?php // check if the repeater field has rows of data

			      if( have_rows('publications') ): ?>

			      <?php while ( have_rows('books') ) : the_row(); ?>

			      	<div class="books">
			      		<h3><?php the_sub_field('title'); ?></h3>
			      		<div class="book-content">
			      			<div class="book-text">
			      				<p><?php the_sub_field('authors'); ?></p>
			      				<?php the_sub_field('content'); ?>	
			      			</div>
			      			<img id="book-img" src="<?php echo the_sub_field( "book_image" ); ?>" alt="<?php the_sub_field('title'); ?>">
			      			<div style="clear:both;"></div>
			      		</div>
			      		<hr>
			      	</div>

			      <?php endwhile; ?>

			  <?php endif; ?>
			</div>
		</li>



		<li>
			<a class="fac-toggle" href="javascript:void(0);"><h2>Short CV</h2></a>
			<div class="fac-inner">
				<ul class="tabs">
					<li class="tab-link current" data-tab="car-tab-1">Career History</li>
					<li class="tab-link" data-tab="car-tab-2">Appointments &amp; Awards</li>
				</ul>

				<div id="car-tab-1" class="tab-content current">
					<table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td align="left" valign="top" width="90"><strong>1974-77</strong></td>
								<td align="left" valign="top">Scholar in mathematics, Trinity College Cambridge.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1977</strong></td>
								<td align="left" valign="top">BA Electrical Sciences, 1st class with distinction.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1977-78</strong></td>
								<td align="left" valign="top">Kennedy Fellow at Massachusetts Institute of Technology, Cambridge, USA.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1978-80</strong></td>
								<td align="left" valign="top">Scientist with Ferranti Edinburgh, Electro-optics group.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1980-83</strong></td>
								<td align="left" valign="top">Research Associate and Ph.D. student at Edinburgh University. Awarded Ph.D. in Computer Vision, 1983.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1983-87</strong></td>
								<td align="left" valign="top">Lecturer in Computer Science, Edinburgh University.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1984-87</strong></td>
								<td align="left" valign="top">Royal Society Research Fellow.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1987-96</strong></td>
								<td align="left" valign="top">Lecturer in Image Processing, Dept. Engineering Science, University of Oxford.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1987-99</strong></td>
								<td align="left" valign="top">Fellow of Exeter College, Oxford.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1996-9</strong></td>
								<td align="left" valign="top">Professor of Engineering Science, University of Oxford.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1998-9</strong></td>
								<td align="left" valign="top">Royal Society Senior Research Fellow.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1999-02</strong></td>
								<td align="left" valign="top">Senior Research Scientist, Microsoft Research, Cambridge.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1999</strong></td>
								<td align="left" valign="top">Visiting Professor of Engineering Science, University of Oxford.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2000</strong></td>
								<td align="left" valign="top">Fellow of Clare Hall, University of Cambridge.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2002</strong></td>
								<td align="left" valign="top">Principal Research Scientist, Microsoft Research.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2005</strong></td>
								<td align="left" valign="top">Partner, Microsoft Corporation.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2006</strong></td>
								<td align="left" valign="top">Visiting Professor of Informatics University of Edinburgh.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2007</strong></td>
								<td align="left" valign="top">Visiting Professor of Machine Intelligence, University of Cambridge.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2008</strong></td>
								<td align="left" valign="top">Deputy Laboratory Director Microsoft Research Cambridge</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2010</strong></td>
								<td align="left" valign="top">Microsoft Distinguished Scientist &amp; Laboratory Director, Microsoft Research Cambridge</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div id="car-tab-2" class="tab-content">
					<table border="0" width="100%" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td align="left" valign="top" width="90"><strong>1977</strong></td>
								<td align="left" valign="top">Lamb prize of the University of Cambridge for Electrical Sciences.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1977</strong></td>
								<td align="left" valign="top">ver Heyden der Lancey prize, Trinity College, Cambridge.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1977-78</strong></td>
								<td align="left" valign="top">John F. Kennedy Fellow, MIT, USA.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1984</strong></td>
								<td align="left" valign="top">Nominated for publisher-s prize at the American Association for Artificial Intelligence (AAAI) conference, in Austin, Texas.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1984-87</strong></td>
								<td align="left" valign="top">Awarded the Royal Society IBM Research Fellowship.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1986</strong></td>
								<td align="left" valign="top">Commendation for paper presented to the IEEE Conference on Computer Vision and Pattern Recognition, Miami, USA.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1987</strong></td>
								<td align="left" valign="top">Appointed Associate Editor of J. Image and Vision Computing, Butterworth.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1991-92</strong></td>
								<td align="left" valign="top">Associate Editor of Transactions on Pattern Analysis and Machine Intelligence of the IEEE.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1991-90</strong></td>
								<td align="left" valign="top">Editorial board, Vision Research, Pergamon Press.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1991</strong></td>
								<td align="left" valign="top">Appointed joint organiser (with Professors D.Mumford, Harvard and B.Ripley, Oxford) of a 6 month programme in Computer Vision for 1993, at the Isaac Newton Institute, Cambridge, UK.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1992</strong></td>
								<td align="left" valign="top">Winner (with R. Cipolla) of the biennial prize of the European Vision Society.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1993</strong></td>
								<td align="left" valign="top">Visiting Fellowship at Clare Hall, Cambridge, July-December.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1993</strong></td>
								<td align="left" valign="top">Appointed to the Editorial board, International Journal Computer Vision, Kluwer.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1994</strong></td>
								<td align="left" valign="top">Elected Fellow of the Institute of Electrical Engineers.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1994-5</strong></td>
								<td align="left" valign="top">Program Chairman, IEEE International Conference on Computer Vision, Cambridge, USA.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1996</strong></td>
								<td align="left" valign="top">Winner (with M. Isard) of the biennial prize of the European Vision Society.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1996</strong></td>
								<td align="left" valign="top">Paper (with E. Rimon) nominated for the annual prize of the IEEE Robotics and Automation society.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1997-02</strong></td>
								<td align="left" valign="top">Editorial board member for Computer Vision and Image Understanding, Academic Press.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1998</strong></td>
								<td align="left" valign="top">Elected Fellow of the Royal Academy of Engineering.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1998-9</strong></td>
								<td align="left" valign="top">Program Chairman, IEEE International Conference on Computer Vision, Greece.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>1998-9</strong></td>
								<td align="left" valign="top">Royal Society Senior Research Fellow (Amersham).</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2000</strong></td>
								<td align="left" valign="top">Elected Fellow of Clare Hall College, Cambridge.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2000-5</strong></td>
								<td align="left" valign="top">Appointed to the Technical Advisory Board of the Max Planck Institute for Biological Cybernetics, T-ubingen.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2001-4</strong></td>
								<td align="left" valign="top">Appointed to the Governing Body of the BBSRC Silsoe Research Institute, UK.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2001</strong></td>
								<td align="left" valign="top">Awarded (with K. Toyama) the David Marr Prize of the IEEE, for Computer Vision.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2004</strong></td>
								<td align="left" valign="top">Elected the Distinguished Fellow of the British Machine Vision Association for 2004.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2005</strong></td>
								<td align="left" valign="top">Awarded (with V. Kolmogorov, A. Criminisi, G. Cross, C. Rother) honourable mention for best paper at the IEEE Conference on Computer Vision and Pattern Recognition (CVPR).</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2005</strong></td>
								<td align="left" valign="top">Promoted to Partner, Microsoft Corporation.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2005</strong></td>
								<td align="left" valign="top">Elected Fellow of the Royal Society.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2006</strong></td>
								<td align="left" valign="top">Awarded Silver Medal of Royal Academy of Engineers.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2007</strong></td>
								<td align="left" valign="top">Awarded Mountbatten Medal of the Institution of Engieering and Technology.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2008</strong></td>
								<td align="left" valign="top">Elected fellow of the IEEE.</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2010</strong></td>
								<td align="left" valign="top">Elected to the Council of the Royal Society</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2010</strong></td>
								<td align="left" valign="top">Appointed Laboratory Director, Microsoft Research Cambridge</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2011</strong></td>
								<td align="left" valign="top">Recipient of Royal Academy of Engineering MacRobert Award</td>
							</tr>
							<tr>
								<td align="left" valign="top"><strong>2012</strong></td>
								<td align="left" valign="top">Elected to the Board of the EPSRC</td>
							</tr>
						</tbody>
					</table>
				</div>

			</div>
		</li>

		<li>
			<a class="fac-toggle" href="javascript:void(0);"><h2>Favourite Publications</h2></a>
			<div class="fac-inner">
				<?php echo the_field('favourite_publications'); ?>
			</div>
		</li>

	</ul>


</div>
<?php get_sidebar('faculty'); ?>
</div><!-- #primary -->

</div>

<?php get_footer(); ?>
